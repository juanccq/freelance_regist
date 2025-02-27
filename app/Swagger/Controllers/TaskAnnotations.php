<?php

namespace App\Swagger\Controllers;

/**
 * @OA\Info(
 *     title="Task API",
 *     version="1.0.0",
 *     description="API for managing tasks."
 * )
 */

/**
 * @OA\Tag(
 *     name="Tasks",
 *     description="Endpoints related to tasks"
 * )
 */

/**
 * @OA\Get(
 *     path="/api/tasks",
 *     summary="Get all tasks",
 *     tags={"Tasks"},
 *     @OA\Parameter(
 *          name="sortBy",
 *          in="query",
 *          description="Field to sort the results",
 *          required=false,
 *          @OA\Schema(
 *              type="string",
 *              default="name",
 *              example="name"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="sortOrder",
 *          in="query",
 *          description="Order to sort the results (asc or desc)",
 *          required=false,
 *          @OA\Schema(
 *              type="string",
 *              enum={"asc", "desc"},
 *              example="desc"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="search",
 *          in="query",
 *          description="Search term to filter results, search fields: name, description",
 *          required=false,
 *          @OA\Schema(
 *              type="string",
 *              example="Task one"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="pageItems",
 *          in="query",
 *          description="Determine the amount of items returned on each page",
 *          required=false,
 *          @OA\Schema(
 *              type="integer",
 *              example="10|20|25|30"
 *          )
 *      ),
 *     @OA\Response(
 *         response=200,
 *         description="List of tasks",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TaskResponse"))
 *     )
 * )
 *
 *
 * @OA\Post(
 *     path="/api/tasks",
 *     summary="Create a new task",
 *     tags={"Tasks"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Task one"),
 *             @OA\Property(property="description", type="string", example="Loren ipsum at donei"),
 *             @OA\Property(property="project_id", type="integer", example="10")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Task created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Task")
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/tasks/{id}",
 *     summary="Get a specific task by ID",
 *     tags={"Tasks"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Tasks details",
 *         @OA\JsonContent(ref="#/components/schemas/Task")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Task not found"
 *     )
 * )
 *
 * @OA\Put(
 *     path="/api/tasks/{id}",
 *     summary="Update an existing task",
 *     tags={"Tasks"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Task updated"),
 *             @OA\Property(property="description", type="string", example="Loren Impsum at donei"),
 *             @OA\Property(property="project_id", type="integer", example="9")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Task updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Task")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Task not found"
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/api/tasks/{id}",
 *     summary="Delete a task",
 *     tags={"Tasks"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Task deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Task not found"
 *     )
 * )
 */
class TaskAnnotations {}
