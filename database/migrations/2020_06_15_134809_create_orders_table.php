<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->json('products_id');
            $table->integer('cost')->unsigned();
            $table->string('type', 48);
            $table->string('hash', 32);
            $table->bigInteger('promocode_id')->unsigned()->nullable();
            $table->string('status', 48);
            $table->timestamps();

            $table->foreign('customer_id', 'orders-customer_id-to-customers-id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');

            $table->foreign('promocode_id', 'orders-promocode_id-promocodes-id')
                ->references('id')
                ->on('promocodes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
