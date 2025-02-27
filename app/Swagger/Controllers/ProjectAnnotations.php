<?php

namespace App\Swagger\Controllers;

/**
 * @OA\Info(
 *     title="Projet API",
 *     version="1.0.0",
 *     description="API for managing projects."
 * )
 */

/**
 * @OA\Tag(
 *     name="Projects",
 *     description="Endpoints related to projects"
 * )
 */

/**
 * @OA\Get(
 *     path="/api/projects",
 *     summary="Get all projects",
 *     tags={"Projects"},
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
 *              example="Project one"
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
 *         description="List of projects",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ProjectResponse"))
 *     )
 * )
 *
 *
 * @OA\Post(
 *     path="/api/projects",
 *     summary="Create a new project",
 *     tags={"Projects"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Project one"),
 *             @OA\Property(property="description", type="string", example="Loren ipsum at donei")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Project created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Project")
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/projects/{id}",
 *     summary="Get a specific project by ID",
 *     tags={"Projects"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Project details",
 *         @OA\JsonContent(ref="#/components/schemas/Project")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Project not found"
 *     )
 * )
 *
 * @OA\Put(
 *     path="/api/projects/{id}",
 *     summary="Update an existing project",
 *     tags={"Projects"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Project updated"),
 *             @OA\Property(property="description", type="string", example="Loren Impsum at donei")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Project updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Project")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Project not found"
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/api/projects/{id}",
 *     summary="Delete a project",
 *     tags={"Projects"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Project deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Project not found"
 *     )
 * )
 */
class ProjectAnnotations {}
