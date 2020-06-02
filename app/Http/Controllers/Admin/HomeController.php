<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TgBotInvite;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
