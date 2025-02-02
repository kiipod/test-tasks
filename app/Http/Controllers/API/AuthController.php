<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Response\FailAuthResponse;
use App\Http\Response\FailResponse;
use App\Http\Response\SuccessResponse;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(private readonly UserService $userService)
    {
    }

    /**
     * Метод отвечает за регистрацию пользователя в API
     *
     * @param RegisterRequest $request
     * @return SuccessResponse|FailResponse
     */
    public function register(RegisterRequest $request): SuccessResponse|FailResponse
    {
        try {
            $userDto = UserDTO::fromRequest($request->validated());
            $user = $this->userService->createUser($userDto);
            $token = $user->createToken('UserToken')->accessToken;

            return new SuccessResponse(data: [
                'message' => 'User created successfully',
                'user' => $user,
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return new FailResponse($e->getMessage());
        }
    }

    /**
     * Метод отвечает за авторизацию пользователя в API
     *
     * @param LoginRequest $request
     * @return SuccessResponse|FailAuthResponse
     */
    public function login(LoginRequest $request): SuccessResponse|FailAuthResponse
    {
        try {
            if (! Auth::attempt($request->validated())) {
                return new FailAuthResponse(trans('auth.failed'), Response::HTTP_UNAUTHORIZED);
            }

            $user = $request->user();
            $token = $user->createToken('userToken')->accessToken;

            return new SuccessResponse(data: [
                'message' => 'User login successfully',
                'user' => $user,
                'token' => $token
            ]);
        } catch (\Exception) {
            return new FailAuthResponse();
        }
    }

    /**
     * Метод отвечает за отзыв токена пользователя при выходе из API
     *
     * @return SuccessResponse|FailResponse
     */
    public function logout(): SuccessResponse|FailResponse
    {
        try {
            Auth::user()->token()->revoke();

            return new SuccessResponse(data: [
                'message' => 'User logout successfully'
            ]);
        } catch (\Exception) {
            return new FailResponse();
        }
    }

    /**
     * Метод отвечает за показ списка сессий клиента API
     *
     * @return JsonResponse
     */
    public function listSessions(): JsonResponse
    {
        return response()->json(Auth::user()->tokens->map(function ($token) {
            return [
                'id' => $token->id,
                'created_at' => $token->created_at,
                'expires_at' => $token->expires_at,
            ];
        }));
    }

    /**
     * Метод отвечает за удаление сессий из списка клиента API
     *
     * @param $sessionId
     * @return JsonResponse
     */
    public function closeSession($sessionId): JsonResponse
    {
        Auth::user()->tokens()->where('id', $sessionId)->delete();
        return response()->json(['message' => 'Session closed']);
    }
}
