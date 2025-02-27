<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="LoginRequest",
 *     type="object",
 *     title="Login Request",
 *     description="Schema for user login request",
 *     required={"email", "password"},
 *     @OA\Property(property="email", type="string", format="email", example="user@example.com",
 *      description="User's email address"),
 *     @OA\Property(property="password", type="string", format="password", example="secret123",
 *      description="User's password")
 * )
 *
 * @OA\Schema(
 *     schema="LoginResponse",
 *     type="object",
 *     title="Login Response",
 *     description="Schema for user login response",
 *     @OA\Property(property="access_token", type="string",
 *      example="1|xxxxxxx", description="Access token for the user"),
 *     @OA\Property(property="token_type", type="string", example="Bearer", description="Type of the token")
 * )
 */

class LoginSchema
{
}
