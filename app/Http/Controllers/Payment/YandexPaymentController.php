<?php

namespace App\Http\Controllers;

use App\Services\Payment\YandexPaymentService;
use Illuminate\Http\Request;

class YandexPaymentController extends Controller
{
    protected $service;

    public function __construct(YandexPaymentService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $code = 200;
        if(!$this->service->handleSuccessPayment($request))
            $code = 400;

        return response()->setStatusCode($code);
    }
}
