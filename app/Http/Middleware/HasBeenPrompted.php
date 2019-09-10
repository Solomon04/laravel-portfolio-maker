<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class HasBeenPrompted
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
        $users = User::all();
        if($users->isEmpty()){
            return response('Please run: <code style="color: red;"><i>php artisan prompt</i></code> in the terminal to start your applicaion.');
        }
        return $next($request);
    }
}
