<?php

use App\Models\Order;
use App\Models\TgInviteLink;
use App\Models\User\Customer;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 5)->make()->each(function (Order $order) {

            $inviteLink = factory(TgInviteLink::class)->create();
            $order->tg_invite_link_id = $inviteLink->id;
            $order->cost = $inviteLink->product_id == 1 ? 250 : 500;

            $user = factory(User::class)->create();

            $customer = factory(Customer::class)->create(
                ['user_id' => $user->id]
            );
            $order->customer_id = $customer->id;

            $order->save();
        });
    }
}
