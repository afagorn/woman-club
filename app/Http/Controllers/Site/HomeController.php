<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home');
    }

    /**
     * Страница благодарности после успешной оплаты
     * @param Request $request
     * @return Response|View
     */
    public function successPayment(Request $request)
    {
        $validator = \Validator::make($requestData = $request->all(), [
            'orderHash' => 'required'
        ]);

        if($validator->fails())
            return response('Wrong GET arguments', 400);

        $order = Order::where([
            'hash' => $requestData['orderHash'],
            'status' => Order::STATUS_PAID
        ])->first();

        return view('site.successPayment', compact('order'));
    }
}
