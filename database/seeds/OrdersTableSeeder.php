<?php

use App\Models\Order;
use App\Models\TgBotInvite;
use App\Models\User\Customer;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $products = \App\Models\Product\Product::all();
        $promocodes = factory(\App\Models\Promocode::class, 2)->create();
        factory(Order::class, 5)->make()->each(function (Order $order) use ($products, $promocodes) {
            $product = $products[rand(0, count($products) - 1)];//Пока только один рандомный продукт
            $order->products_id = [$product->id];

            //Если 1, то создаем промокод и считаем цену с промокодом. Иначе просто сумма всех продуктов
            if(rand(0, 1)) {
                $promocode = $promocodes[rand(0,1)];
                $order->cost = round($order->getSumProducts() * $promocode->discount / 100);
                $order->promocode_id = $promocode->id;
            }
            else
                $order->cost = $order->getSumProducts();

            //Создание Покупателя
            factory(User::class, 1)->create()->each(function (User $user) use ($order) {
                factory(Customer::class, 1)->create(['user_id' => $user->id])->each(function (Customer $customer) use ($order) {
                    $order->customer_id = $customer->id;
                });
            });

            $order->save();

            //Пока не используется
            $invite = factory(TgBotInvite::class)->make();
            $invite->order_id = $order->id;
            $invite->save();
        });
    }
}
