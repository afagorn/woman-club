<?php
namespace App\Services;

use App\Http\API\SendpulseAPI;
use App\Http\Requests\Admin\Order\CreateAdminRequest;
use App\Http\Requests\Site\Order\CreateRequest;
use App\Models\DTO\User\CustomerDTO;
use App\Models\DTO\User\UserDTO;
use App\Models\Order;
use App\Models\Product\Product;
use App\Repositories\Interfaces\IPromocodeRepository;
use App\Services\User\CustomerService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

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
     * @var SendpulseAPI
     */
    private $sendpulseAPI;

    /**
     * @var IPromocodeRepository
     */
    private $promocodeRepository;

    /**
     * OrderService constructor.
     * @param TgBotInviteService $tgBotInviteService
     * @param CustomerService $customerService
     * @param IPromocodeRepository $promocodeRepository
     * @param SendpulseAPI $sendpulseAPI
     */
    public function __construct(TgBotInviteService $tgBotInviteService, CustomerService $customerService, IPromocodeRepository $promocodeRepository, SendpulseAPI $sendpulseAPI)
    {
        $this->tgBotInviteService = $tgBotInviteService;
        $this->customerService = $customerService;
        $this->sendpulseAPI = $sendpulseAPI;
        $this->promocodeRepository = $promocodeRepository;
    }

    /**
     * Создание заказа со стороны Админки
     * @param CreateAdminRequest $request
     * @return Order
     */
    public function createAdmin(CreateAdminRequest $request): Order
    {
        $order = $this->make($request);

        if ($request['status'] === Order::STATUS_PAID)
            $order = $this->handlePaidOrder($order->id);

        return $order;
    }

    /**
     * Создание заказа со стороны Клиента
     * @param CreateRequest $request
     * @return Order
     */
    public function create(CreateRequest $request)
    {
        return $this->make($request);
    }

    /**
     * Создание заказа
     * Создаваться может из админки и со стороны клиента
     * @param FormRequest|CreateRequest|CreateAdminRequest $request Разные правила валидации для админки и для клиента
     * @return Order
     */
    private function make(FormRequest $request): Order
    {
        $customer = $this->customerService->create(new CustomerDTO(
            new UserDTO($request['email'], $request['name'])
        ));

        if(!is_array($productsId = $request['products_id']))
            $productsId = json_decode($request['products_id'], true);

        $products = Product::whereIn('id', $productsId)->get();
        if(is_null($products) || empty($products))
            throw new \InvalidArgumentException('Wrong products id');

        $sumProducts = 0;
        foreach ($products as $product)
            $sumProducts += (int) $product->cost;

        if(!is_null($request['promocode']) && !is_null($promocode = $this->promocodeRepository->getValidByName($request['promocode'])))
            $sumCostOrder = round($sumProducts - ($sumProducts * $promocode->discount / 100));
        else
            $sumCostOrder = $sumProducts;

        return Order::new(
            $customer->id,
            $productsId,
            Order::TYPE_SUB_NEW,
            $sumCostOrder,
            $request['status'] ?? Order::STATUS_NOT_PAID,
            $promocode->id ?? null
        );
    }

    /**
     * Обработка оплаченного заказа
     * Меняем статус заказа на оплачено и отправляем письмо через сендпульс
     * @param int $orderId
     * @return Order|Model|null
     */
    public function handlePaidOrder(int $orderId)
    {
        $order = Order::where(['id' => $orderId])
            ->with(['customer.user'])
            ->first();
        $order->doStatusPaid();

        $invite = $this->tgBotInviteService->create($orderId);//Пока бот не используется

        if(!is_null($order->customer->user->email))
            $this->sendpulseAPI->getApi()->addEmails(
                $this->sendpulseAPI->getPaymentAddressBookId(),
                [
                    [
                        'email' => $order->customer->user->email,
                        'variables' => [
                            'name' => $order->customer->user->name
                        ]
                    ]
                ]
            );

        return $order;
    }
}
