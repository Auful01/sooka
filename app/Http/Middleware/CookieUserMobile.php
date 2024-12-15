<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CookieUserMobile
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
        if (!isset($_COOKIE['token'])) {
            return redirect('/mobile/sign-in');
        }

        $token = $_COOKIE['token'];


        if (!$token) {
            return response()->json(['message' => 'Token not provided'], Response::HTTP_UNAUTHORIZED);
        }

        try {
            // Validate the JWT token
            $user = JWTAuth::setToken($token)->authenticate();

            Auth::setUser($user);
        } catch (JWTException $e) {
            return response()->json(['message' => 'Invalid token'], Response::HTTP_UNAUTHORIZED);
        }
        // Add the authenticated user to the request
        $request->merge(['auth_user' => $user]);

        // dd($user->role == );
        return $next($request);


    }
}
