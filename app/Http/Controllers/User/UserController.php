<?php

namespace App\Http\Controllers\User;

use App\Application\Services\User\DTO\IndexUserDTO;
use App\Application\Services\User\UserService;
use App\Domain\Models\User\Resource\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


/**
 * @OA\Get (
 *     path="/api/users/index/{page}",
 *     summary="Get all users",
 *     tags={"Users"},
 *
 *     @OA\Parameter(
 *         name="page",
 *         in="path",
 *         required=true,
 *     ),
 *
 *     @OA\Response(
 *         response="200",
 *         description="Get all users",
 *     )
 * )
 */
class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function index(int $page): JsonResponse|AnonymousResourceCollection
    {
        $data = new IndexUserDTO(['page' => $page]);

        try {
            $users = $this->service->index($data);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }

        return UserResource::collection($users);
    }
}
