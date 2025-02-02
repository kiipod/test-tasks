<?php

declare(strict_types=1);

namespace App\DTO;

class UserDTO
{
    /**
     * @param string $name
     * @param string|null $secondName
     * @param string $surname
     * @param string $phone
     * @param string $email
     * @param string $password
     * @param int $partnershipId
     */
    public function __construct(
        public string $name,
        public ?string $secondName,
        public string $surname,
        public string $phone,
        public string $email,
        public string $password,
        public int $partnershipId,
    ) {
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            secondName: $data['second_name'] ?? null,
            surname: $data['surname'],
            phone: $data['phone'],
            email: $data['email'],
            password: $data['password'],
            partnershipId: (int) $data['partnership_id']
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'second_name' => $this->secondName,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => $this->password,
            'partnership_id' => $this->partnershipId,
        ];
    }
}
