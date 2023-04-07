<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
         
        $table->increments('id');
          $table->unsignedInteger('event_product_id');
          $table->unsignedInteger('user_id')->nullable();
          $table->string('ip_address')->nullable();
          $table->unsignedInteger('order_id')->nullable();
          $table->integer('product_quantity')->default(1);
          $table->float('price_after_discount');
          $table->tinyInteger('deliver_status')->default(0)->comment('0=processing,1=to home,2=delivered');
          $table->tinyInteger('order_status')->default(0)->comment('0=ordered,1=confirm,2=cancel,3=return');
          
          $table->timestamps();
          $table->index(['user_id','event_product_id','order_id']);
        //   $table->foreign('user_id')
        //   ->references('id')->on('users')
        //   ->onDelete('cascade');

        //   $table->foreign('product_id')
        //   ->references('id')->on('products')
        //   ->onDelete('cascade');

        //   $table->foreign('order_id')
        //   ->references('id')->on('orders')
        //   ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
