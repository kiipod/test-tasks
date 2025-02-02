<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class UserService
{
    /**
     * Метод отвечает за создание нового пользователя.
     *
     * @param UserDTO $userDto
     * @return User
     * @throws InternalErrorException
     */
    public function createUser(UserDTO $userDto): User
    {
        $user = new User([
            'name' => $userDto->name,
            'second_name' => $userDto->secondName,
            'surname' => $userDto->surname,
            'phone' => $userDto->phone,
            'email' => $userDto->email,
            'password' => bcrypt($userDto->password),
            'partnership_id' => $userDto->partnershipId,
        ]);

        if (! $user->save()) {
            throw new InternalErrorException('The error on the server, please, try again', 500);
        }

        return $user;
    }
}
