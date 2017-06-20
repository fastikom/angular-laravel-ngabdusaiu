<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function home()
    {

    	$posts = \App\Post::all();
    	return view('app', compact('posts'));
    }
    public function addPost(Request $request)
    {  
        $rules = [
            'title' => 'required|max:255',
            'text' => 'required',
           
        ];
       
        $validator = \Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
        $val_errors = json_decode($validator->errors());
            // return \Response::json(['errors' => $validator->errors()]);
        };

       
        $body = [
            'secret' => env('RE_CAP_SECRET'),
            'response' => $request->capcha,
        ];
        
        $client = new \Guzzle\Service\Client;

    
        $cap_response = json_decode($client->post('https://www.google.com/recaptcha/api/siteverify', '', $body)->send()->getBody());

        if ($cap_response->success !== true) {
           
            if (empty($val_errors)) {
                $val_errors = new \stdClass();
            }
            $val_errors->capcha = ['Wrong capcha'];
            // json_encode($val_errors);
        }

        if (!empty($val_errors)) {
            return json_encode(['errors' => $val_errors, 'inputs' => $request->all()]);
        }
        // Membuat Artikel
        try {
            $post = \App\Post::create([
                'title' => $request->title,
                'description' => $request->text
            ]);
        } catch (Exception $e) {
            return json_encode(['errors' => $e->getMessage()]);
        }
        return ([
            'capcha' => ($cap_response->success), 
            'messages' => ['post' => ['Article ' . $post->title . ' succesfuly added']],
            'post' => $post
        ]);

        
    }
    public function createUser(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:users|max:16',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);


        if($validator->fails()) {
            return \Response::json([
                'errors' => $validator->errors()
            ]);
        };

        // if user exist i t.d.
        $user = \App\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if ($request->role) {
            $user->assignRole($request->role['id']);
        } else {
            $user->assignRole(1);
        }
        

        return \Response::json($user);
    }
    public function getCurrentUser()
    {
        if (\Auth::guest()) {
            return \Response::json(['flash' => 'need to auth']);
        } else {

       
            $user = \App\User::with('roles')->find(\Auth::user()->id);

        // dd($user);
            return \Response::json($user);
        }

    }
    public function getUser($id)
    {
        $user = \App\User::with('roles')->find($id);
        return \Response::json($user);
    }
    public function getUsers()
    {
        return \Response::json(\App\User::with('roles')->get());
    }

    public function getRoles()
    {
        // $user = \App\User::with('roles')->find(\Auth::user()->id);
        $roles = \App\Role::all();
        return \Response::json($roles);
    }

    public function index()
    {   
        session_start();
        $posts = \App\Post::with('category')->with('tags')->get();
        $_SESSION['user']['auth'] = false;
        $_SESSION['user']['name'] = 'Alex';
        $_SESSION['user']['admin'] = true;
        // $user = $_SESSION['user'];

        return compact('posts');
    }

    public function show($id)
    {
        return \App\Post::with('category')->with('tags')->find($id);
    }

    public function updatePost($id, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required'
            ]);
        if ($validator->fails()) {
            return \Response::json([
                "message" => 'not updated',
                'errors' => $validator->errors(),
                ]);
        };

        $post = \App\Post::find($request->id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return \Response::json($request->all());
    }
}
