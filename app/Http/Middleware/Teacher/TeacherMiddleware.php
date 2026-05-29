<?php

namespace App\Http\Middleware\Teacher;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('teacher.login');
        }
        if(Auth::user()->role !='admin' || 'teacher'){
            die("Access Denied");
        }
        return $next($request);
    }
}
