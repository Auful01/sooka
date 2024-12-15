<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckCookie
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
        // Check if the 'token' cookie exists
        if (isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
            // dd($_COOKIE);

            if (!$token) {
                return response()->json(['message' => 'Token not provided'], Response::HTTP_UNAUTHORIZED);
            }

            try {
                // Validate the JWT token
                $user = JWTAuth::setToken($token)->authenticate();
            } catch (JWTException $e) {
                return response()->json(['message' => 'Invalid token'], Response::HTTP_UNAUTHORIZED);
            }
            // Add the authenticated user to the request
            $request->merge(['auth_user' => $user]);

            if ($user->role == "1") {
                return redirect('/admin/dashboard');
            }elseif($user->role == "2"){
                return redirect('/dashboard');
            }else{
                return $next($request);
            }
        } else{
            return $next($request);
        }


    }
}
