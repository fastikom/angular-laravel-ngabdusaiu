<?php

namespace App\Http\Middleware;

use Closure;

class AdministratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \App\User::with('roles')->find($request->user()->id);
        
        if ($user->roles[0]->name !== 'admin') {
            return \Response::json(['error' => 'Доступ запрещее. Не админ', 'message' => 'Access Denied']);
        }

        return $next($request);
    }
}
