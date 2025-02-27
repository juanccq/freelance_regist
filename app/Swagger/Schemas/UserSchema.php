<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="User name"),
 *     @OA\Property(property="email", type="string", example="test@example.com"),
 *     @OA\Property(property="is_admin", type="integer", example="1 or 0")
 * )
 */

class UserSchema {}
