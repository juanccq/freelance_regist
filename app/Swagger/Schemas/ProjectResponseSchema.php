<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="ProjectResponse",
 *     type="object",
 *     title="Project Response",
 *     @OA\Property(
 *       property="name",
 *       type="array",
 *       description="List of projects",
 *       @OA\Items(ref="#/components/schemas/Project")
 *     ),
 *     @OA\Property(
 *       property="message",
 *       type="string",
 *       example="..."
 *     )
 * )
 */

class ProjectResponseSchema {}
