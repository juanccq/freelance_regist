<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Tasks name"),
 *     @OA\Property(property="description", type="string", example="Loren Ipsum"),
 *     @OA\Property(property="project_id", type="integer", example="17")
 * )
 */

class TaskSchema {}
