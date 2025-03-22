<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Models\WishList;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class LoggedInDataSharer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Retrieve the JWT token from the request header or cookie
        $token = $request->bearerToken() ?? $request->cookie('token');

        if (!$token) {
            return $next($request);
        }
        try {
            $result = JWTToken::verifyToken($token);
            if ($result !== 'unauthorized' && $result->role === 'user') {
                Inertia::share('isAuth', true);
                $wishlistCount = WishList::where('user_id', $result->userID)->count();
                Inertia::share('wishlistCount', $wishlistCount);

                return $next($request);
            }
            return $next($request);
        } catch (\Exception $e) {
            return $next($request);
        }
    }
}
