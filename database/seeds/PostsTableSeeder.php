<?php

use Illuminate\Database\Seeder;
use App\Post;		

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
 

            

                
            
        

        DB::table('posts')->delete();
        for ($i=0; $i<10; $i++) {
            $response = file_get_contents('https://randomuser.me/api/');
            $response = json_decode($response);

            $name = $response->results[0]->user->name->first . ' ' . $response->results[0]->user->name->last;

            $text = json_decode(file_get_contents('https://baconipsum.com/api/?type=all-meat&paras=2&start-with-lorem=1'));
            $title = explode(' ', $text[0], 10);
	        Post::create([
	        	'title' => $title[7] . ' ' . $title[8],
	        	'author' => $name,
	        	'category_id' => rand(1,3),
	        	'description' =>  $text[0]
	        ]);
    	}
    }
}
