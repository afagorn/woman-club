<?php
namespace App\Services\User;

use App\Models\User\Customer;
use App\Models\User\User;

class CustomerService
{
    public function registerBlank(string $email)
    {
        $customer = Customer::first()->user()->where(['email'=>$email]);

        if(!is_null($customer))
            return $customer;

        $user = User::registerBlank($email);
        return Customer::registerBlank($user->id);
    }
}
