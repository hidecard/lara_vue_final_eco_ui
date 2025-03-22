<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;

class CustomerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('token');
        $result = JWTToken::verifyToken(token: $token);
        if ($result == "unauthorized") {
            return redirect()->guest(route('user.login'));
        }

        if ($result->role === 'user') {
            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userID);
            $request->headers->set('role', $result->role);
            return $next($request);
        } else {
            return redirect()->guest(route('user.login'));
        }
    }
}
