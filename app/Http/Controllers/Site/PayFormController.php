<?php

namespace App\Http\Controllers\Site;

use App\Models\DTO\User\CustomerDTO;
use App\Models\DTO\User\UserDTO;
use App\Services\OrderService;
use App\Services\User\CustomerService;
use Illuminate\Http\Client\Request;

class PayFormController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * PayFormController constructor.
     * @param OrderService $orderService
     * @param CustomerService $customerService
     */
    public function __construct(OrderService $orderService, CustomerService $customerService)
    {
        $this->orderService = $orderService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        if(!\Config::has('yandexMoney.receiver') || empty($receiver = \Config::get('yandexMoney.receiver')))
            throw new \RuntimeException('Не указан номер кошелька для яндекс деньги');

        return view('payForm', compact('receiver'));
    }

    /**
     * Создание нового неоплаченного заказа
     * @param Request $request [email => 'string', products_id => [1,2]]
     * @return int
     */
    public function createPreOrder(Request $request)
    {
        $order = $this->orderService->create(
            $this->customerService->create(new CustomerDTO(new UserDTO($request['email']))),
            $request['products_id']
        );

        return $order->id;
    }
}

