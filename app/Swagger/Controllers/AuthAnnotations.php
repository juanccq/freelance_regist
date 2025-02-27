<?php

namespace App\Swagger\Controllers;

/**
 * @OA\Info(
 *     title="Auth API",
 *     version="1.0.0",
 *     description="API for managing user authentication."
 * )
 */

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="Endpoints related to user authentication"
 * )
 */

/**
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary="User Login",
 *     description="Authenticates a user and returns an access token.",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful login",
 *         @OA\JsonContent(ref="#/components/schemas/LoginResponse")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Unauthorized")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation errors",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="The given data was invalid.")
 *         )
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/auth/logout",
 *     summary="User Logout",
 *     description="Invalidates the authenticated user's access token.",
 *     tags={"Auth"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful logout",
 *         @OA\JsonContent(ref="#/components/schemas/LogoutResponse")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized")
 * )
 */

class AuthAnnotations {}
