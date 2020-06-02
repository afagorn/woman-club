<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Payment\YandexPaymentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    /**
     * @var YandexPaymentService
     */
    protected $yandexService;

    /**
     * PaymentController constructor.
     * @param YandexPaymentService $yandexService
     */
    public function __construct(YandexPaymentService $yandexService)
    {
        $this->yandexService = $yandexService;
    }

    /**
     * Уведомления Я.Денег об успешной оплате
     * @param Request $request
     * @return Response
     */
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
