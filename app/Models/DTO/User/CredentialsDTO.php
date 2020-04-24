<?php
namespace App\Models\DTO\User;

use Illuminate\Support\Carbon;

class CredentialsDTO
{
    /**
     * @var string|null
     */
    public $password;

    /**
     * @var Carbon|null
     */
    public $emailVerifiedAt;

    /**
     * @var string|null
     */
    public $rememberToken;

    /**
     * CredentialsDTO constructor.
     * @param string|null $password
     * @param Carbon|null $emailVerifiedAt
     * @param null $rememberToken
     */
    public function __construct(string $password = null, Carbon $emailVerifiedAt = null, $rememberToken = null)
    {
        $this->password = $password;
        $this->emailVerifiedAt = $emailVerifiedAt;
        $this->rememberToken = $rememberToken;
    }
}
