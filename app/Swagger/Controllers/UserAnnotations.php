<?php

namespace App\Swagger\Controllers;

/**
 * @OA\Info(
 *     title="User API",
 *     version="1.0.0",
 *     description="API for managing users."
 * )
 */

/**
 * @OA\Tag(
 *     name="Users",
 *     description="Endpoints related to users"
 * )
 */

/**
 * @OA\Get(
 *     path="/api/users",
 *     summary="Get all users",
 *     tags={"Users"},
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
 *          description="Search term to filter results, search fields: name, email",
 *          required=false,
 *          @OA\Schema(
 *              type="string",
 *              example="User one"
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
 *         description="List of users",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/UserResponse"))
 *     )
 * )
 *
 *
 * @OA\Get(
 *     path="/api/users/{id}",
 *     summary="Get a specific user by ID",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User details",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found"
 *     )
 * )
 *
 * @OA\Put(
 *     path="/api/users/{id}",
 *     summary="Update an existing user",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="User updated"),
 *             @OA\Property(property="email", type="string", example="test@example.com")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found"
 *     )
 * )
 *
 */
class UserAnnotations {}
