<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTgInviteLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tg_invite_links', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('link');
            $table->string('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('activated_at')->nullable();

            $table->foreign('product_id', 'tg_invite_links-product_id-to-products-id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tg_invite_links');
    }
}
