<?php
namespace App\Services;

use App\Models\DTO\User\CustomerDTO;
use App\Models\Order;
use App\Models\Product\Product;
use App\Models\User\Customer;
use App\Services\User\CustomerService;
use Illuminate\Database\Eloquent\Model;

class OrderService
{
    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * @var TgBotInviteService
     */
    private $tgBotInviteService;

    /**
     * OrderService constructor.
     * @param TgBotInviteService $tgBotInviteService
     * @param CustomerService $customerService
     */
    public function __construct(TgBotInviteService $tgBotInviteService, CustomerService $customerService)
    {
        $this->tgBotInviteService = $tgBotInviteService;
        $this->customerService = $customerService;
    }

    /**
     * Создание нового заказа
     * Сумма заказа считается по переданным продуктам и также отправляется письмо если указан email
     * @param Customer $customer
     * @param array $productsId
     * @param string $type
     * @param string $status
     * @return Order
     */
    public function create(Customer $customer, array $productsId, string $type = Order::TYPE_SUB_NEW, $status = Order::STATUS_NOT_PAID): Order
    {
        $products = Product::whereIn('id', $productsId);
        if(is_null($products) || empty($products))
            throw new \InvalidArgumentException('Wrong products id');

        $sumCostOrder = 0;
        foreach ($products as $product) {
            $sumCostOrder += (int) $product->cost;
        }

        // TODO Отправка письма с ссылкой
        /*if(!is_null($customer->user->email)) {
        }*/

        return Order::new(
            $customer->id,
            $productsId,
            $type,
            $sumCostOrder,
            $status
        );
    }

    /**
     * Обработка оплаченного заказа
     * @param int $orderId
     * @return Order|Model|null
     */
    public function handlePaidOrder(int $orderId)
    {
        $order = Order::find($orderId)->with('customer.user')->first();
        $order->doStatusPaid();

        $invite = $this->tgBotInviteService->create($orderId);

        //TODO Отправка письма с инвайтом на бота
        /*if(!is_null($order->customer->user->email))
            mail($order->customer, $invite->getInviteLink());*/

        return $order;
    }
}
