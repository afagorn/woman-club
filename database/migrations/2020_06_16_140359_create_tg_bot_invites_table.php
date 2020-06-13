<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTgBotInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tg_bot_invites', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 32);
            $table->bigInteger('order_id')->unsigned();
            $table->string('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('activated_at')->nullable();

            $table->foreign('order_id', 'tg_bot_invites-order_id-to-orders-id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            /*$table->foreign('product_id', 'tg_invite_links-product_id-to-products-id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tg_bot_invites');
    }
}
