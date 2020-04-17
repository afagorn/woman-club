<?php

namespace App\Services\Payment;

use App\Models\Product;
use app\Services\TgInviteLinkService;
use Illuminate\Http\Request;

class YandexPaymentService
{
    private $tgInviteLinkService;

    public function __construct(TgInviteLinkService $tgInviteLinkService)
    {
        $this->tgInviteLinkService = $tgInviteLinkService;
    }

    /**
     * Обрабатываем платеж
     */
    public function handlePayment(Request $request)
    {
        $this->checkHash($request['hash']);
        $data = json_decode($request['label']);// {'productId':1}

        if(!Product::isEqualCost($data->productId, $request['amount']))
            return false;

        $this->tgInviteLinkService->create($data->productId, $request['email']);

        return true;
    }

    private function checkHash($hash)
    {

    }
}
