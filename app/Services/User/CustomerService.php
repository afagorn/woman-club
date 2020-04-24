<?php
namespace App\Services\User;

use App\Models\DTO\User\CustomerDTO;
use App\Models\User\Customer;

class CustomerService
{
    public function create(CustomerDTO $DTO)
    {
        if(!is_null($email = $DTO->userDTO->email)) {
            $customer = Customer::join('users', 'users.id', '=', 'user_id')
                ->where(['email' => $email])
                ->first();

            if(!is_null($customer))
                return $customer;
        }

        return Customer::new($DTO);
    }
}
