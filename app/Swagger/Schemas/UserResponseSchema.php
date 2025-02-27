<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="UserResponse",
 *     type="object",
 *     title="User Response",
 *     @OA\Property(
 *       property="name",
 *       type="array",
 *       description="List of users",
 *       @OA\Items(ref="#/components/schemas/User")
 *     ),
 *     @OA\Property(
 *       property="message",
 *       type="string",
 *       example="..."
 *     )
 * )
 */

class UserResponseSchema {}
