<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('tg_invite_link_id')->unsigned();
            $table->string('status', 48);
            $table->timestamps();

            $table->foreign('customer_id', 'orders-customer_id-to-customers-id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');

            $table->foreign('tg_invite_link_id', 'orders-tg_invite_link_id-to-tg_invite_links-id')
                ->references('id')
                ->on('tg_invite_links')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
