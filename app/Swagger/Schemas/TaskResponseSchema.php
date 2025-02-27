<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="TaskResponse",
 *     type="object",
 *     title="Task Response",
 *     @OA\Property(
 *       property="name",
 *       type="array",
 *       description="List of tasks",
 *       @OA\Items(ref="#/components/schemas/Task")
 *     ),
 *     @OA\Property(
 *       property="message",
 *       type="string",
 *       example="..."
 *     )
 * )
 */

class TaskResponseSchema {}
