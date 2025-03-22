<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $result = JWTToken::verifyToken($token);
        if ($result == "unauthorized") {
            return redirect()->guest(route('admin.loginPage'));
        }

        if ($result->role === 'admin') {
            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userID);
            $request->headers->set('role', $result->role);
            return $next($request);
        } else {
            return redirect()->guest(route('admin.loginPage'));
        }
    }
}
