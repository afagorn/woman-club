<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home');
    }

    /**
     * Страница благодарности после успешной оплаты
     * @return \Illuminate\View\View
     */
    public function successPayment(Request $request, $id)
    {
        return view('site.successPayment');
    }
}
