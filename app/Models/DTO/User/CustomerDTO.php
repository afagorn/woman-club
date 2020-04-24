<?php
namespace App\Models\DTO\User;

use Illuminate\Support\Carbon;

class CustomerDTO
{
    /**
     * @var UserDTO|null
     */
    public $userDTO = null;

    /**
     * @var string|null
     */
    public $tgUsername = null;

    /**
     * @var \Illuminate\Support\Carbon|null
     */
    public $unsubscribeDate = null;

    /**
     * CustomerDTO constructor.
     * @param UserDTO|null $userDTO
     * @param null $tgUsername
     * @param Carbon|null $unsubscribeDate
     */
    public function __construct(UserDTO $userDTO = null, $tgUsername = null, Carbon $unsubscribeDate = null)
    {
        $this->userDTO = $userDTO;
        $this->tgUsername = $tgUsername;
        $this->unsubscribeDate = $unsubscribeDate;
    }
}
