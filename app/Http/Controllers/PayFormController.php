<?php

namespace App\Http\Controllers;

class PayFormController extends Controller
{
    public function index()
    {
        if(!\Config::has('yandexMoney.receiver') || empty($receiver = \Config::get('yandexMoney.receiver')))
            throw new \RuntimeException('Не указан номер кошелька для яндекс деньги');

        return view('payForm', compact('receiver'));
    }
}

