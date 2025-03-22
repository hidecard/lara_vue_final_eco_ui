<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('token');
        if ($token) {
            $result = JWTToken::verifyToken(token: $token);
            if ($result == "unauthorized") {
                return back();
                // return response()->json(['message' => 'Authorization Failed!']);
            }

            if ($result->role === 'user') {
                $request->headers->set('email', $result->userEmail);
                $request->headers->set('id', $result->userID);
                $request->headers->set('role', $result->role);
                return $next($request);
            } else if ($result->role === 'admin') {
                $request->headers->set('email', $result->userEmail);
                $request->headers->set('id', $result->userID);
                $request->headers->set('role', $result->role);
                return $next($request);
            }
        } else {
            return back();
        }
    }
}
