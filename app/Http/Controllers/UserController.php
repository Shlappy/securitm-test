<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * Возвращает список всех пользователей с пагинацией.
     *
     * @param Request $request
     * @param UserService $service
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, UserService $service): AnonymousResourceCollection
    {
        $users = $service->getUserList($request->all());

        return UserResource::collection($users);
    }

    /**
     * Возвращает данные конкретного пользователя по его ID.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Создание нового пользователя.
     *
     * @param SaveUserRequest $request
     * @return UserResource
     */
    public function create(SaveUserRequest $request): UserResource
    {
        $user = User::create($request->validated());

        return new UserResource($user);
    }

    /**
     * Обновляет данные существующего пользователя по его ID.
     *
     * @param SaveUserRequest $request
     * @param User $user
     * @return UserResource
     */
    public function update(SaveUserRequest $request, User $user): UserResource
    {
        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Удаляет пользователя по его ID.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $success = $user->delete();

        return response()->json(compact('success'));
    }
}
