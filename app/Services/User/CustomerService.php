<?php
namespace App\Services\User;

use App\Models\DTO\User\CustomerDTO;
use App\Models\TgBotInvite;
use App\Models\User\Customer;
use Illuminate\Database\Query\Builder;

class CustomerService
{
    public function create(CustomerDTO $DTO)
    {
        if(!is_null($email = $DTO->userDTO->email)) {
            $customer = Customer::with(['user' => function($q) use($email) {
                $q->where('email', '=', $email);
            }])->first();

            if(!is_null($customer))
                return $customer;
        }

        return Customer::new($DTO);
    }

    /**
     * Регистрация Покупателя после того как он оплатил и перешел по инвайт ссылке
     * @param string $hash
     * @param string $tgUsername
     * @return TgBotInvite|object|null
     */
    public function registerToTelegram(string $hash, string $tgUsername)
    {
        $invite = TgBotInvite::where(['hash' => $hash, 'status' => TgBotInvite::STATUS_NOT_ACTIVATED])
            ->with(['order.customer'])
            ->first();

        if(is_null($invite))
            return null;

        $invite->order->customer->addTelegramUsername($tgUsername);
        $invite->doActive();

        return $invite;
    }
}
