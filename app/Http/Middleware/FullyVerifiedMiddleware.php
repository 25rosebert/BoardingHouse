<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FullyVerifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->verified === 1){
                return $next($request);
            }
            else{
                return back()->with('status','Your Account is not yet Fully Verified. Please Verify your Account to use this feature of the system. Click the Verify Button');
            }
        } 
    }   
}
