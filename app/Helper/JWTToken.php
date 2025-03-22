<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log;

class JWTToken
{
    public static function createToken($userEmail, $userID, $role, $time)
    {
        $key = config('jwt.secret');
        Log::info('JWT Key:', ['key' => $key]);

        if (!is_string($key)) {
            throw new \Exception('JWT_KEY must be a string.');
        }

        $payload = [
            'iss' => 'FreshCart',
            'iat' => time(),
            'exp' => $time,
            'userEmail' => $userEmail,
            'userID' => $userID,
            'role' => $role,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function verifyToken($token)
    {
        try {
            if ($token === null) {
                return 'unauthorized';
            }

            $key = config('jwt.secret');

            if (!is_string($key)) {
                throw new \Exception('JWT_KEY must be a string.');
            }

            return JWT::decode($token, new Key($key, 'HS256'));
        } catch (Exception $e) {
            return 'unauthorized';
        }
    }
}
