<?php
namespace App\Services\Payment;

use App\Http\Controllers\Controller;

class SuccessPaymentController extends Controller
{
    public function index()
    {
        return view('site.payment.successPayment');
    }
}
