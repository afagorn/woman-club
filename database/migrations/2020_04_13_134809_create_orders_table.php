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
            //$table->bigInteger('product_id')->unsigned();
            $table->json('products_id');
            $table->integer('cost')->unsigned();
            $table->string('type', 48);
            $table->string('status', 48);
            $table->timestamps();

            $table->foreign('customer_id', 'orders-customer_id-to-customers-id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');

            /*$table->foreign('product_id', 'tg_bot_invites-product_id-to-products-id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');*/

            /*$table->foreign('tg_invite_link_id', 'orders-tg_invite_link_id-to-tg_invite_links-id')
                ->references('id')
                ->on('tg_invite_links')
                ->onDelete('restrict');*/
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
