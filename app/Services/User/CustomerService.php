<?php
namespace App\Services\User;

use App\Models\User\Customer;
use App\Models\User\User;

class CustomerService
{
    /**
     * Создание "пустого" Costumer. То есть с одним только email, без авторизационных данных
     * @param string $email
     */
    public function createBlank(string $email)
    {
        //$customer = Customer::first()->user()->where(['email'=>$email]);
        /*$customer = Customer::with(['user' => function($query) use($email) {
           $query->where(['email'=>$email]);
        }])->get();*/
        //$email = 'xander.wisoky@example.org';
        $customer = Customer::join('users', 'users.id', '=', 'user_id')
            ->where(['email'=>$email])
            ->first();

        //dd($customer);

        if(!is_null($customer))
            return $customer;

        $user = User::createBlank($email);
        return Customer::createBlank($user->id);
    }
}
