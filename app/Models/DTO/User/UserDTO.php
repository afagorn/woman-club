<?php
namespace App\Models\DTO\User;

class UserDTO
{
    /**
     * @var string|null
     */
    public $email = null;

    /**
     * @var string|null
     */
    public $name = null;

    /**
     * @var CredentialsDTO
     */
    public $credentialsDTO;

    public function __construct(string  $email = '', string $name = '', CredentialsDTO $credentialsDTO = null)
    {
        $this->email = $email;
        $this->name = $name;
        $this->credentialsDTO = $credentialsDTO ?? new CredentialsDTO();
    }
}
