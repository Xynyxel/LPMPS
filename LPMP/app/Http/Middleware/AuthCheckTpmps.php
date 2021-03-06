<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheckTpmps
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
        if(!session()->has('LoggedUserTpmps') && ($request->path() != 'auth/loginTpmps')){
            return redirect('auth/loginTpmps') -> with('failTpmps','You must be logged in');
        }
        if(session()->has('LoggedUserTpmps') && ($request->path() == 'auth/loginTpmps') ){
            return redirect('tpmps/home');
        }

        // return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        //                         ->header('Pragma','no-cache')
        //                         ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
        $response = $next($request);
        $headers = [
            'Cache-Control' => 'nocache, no-store, max-age=0, must-revalidate',
            'Pragma','no-cache',
            'Expires','Fri, 01 Jan 1990 00:00:00 GMT',
        ];
        
        foreach($headers as $key => $value) {
            $response->headers->set($key, $value);
        }
        
        return $response;
    }
}
