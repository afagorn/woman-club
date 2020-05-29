<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Payment\YandexPaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $yandexService;

    public function __construct(YandexPaymentService $yandexService)
    {
        $this->yandexService = $yandexService;
    }

    public function yandexNotification(Request $request)
    {
        $validator = \Validator::make($requestData = $request->all(), [
            'sha1_hash' => 'required',
            'amount' => 'required',
            'label' => 'required'
        ]);

        if($validator->fails())
            return response('Wrong HTTP arguments', 400);

        try {
            $this->yandexService->handleSuccessPayment($requestData);
            return response('OK', 200);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 400);
        }
    }
}
