<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
      $table->increments('id');
      $table->string('order_gen_id', 100);
      $table->unsignedInteger('user_id')->nullable();
      $table->string('ip_address', 150)->nullable();
      $table->float('custom_discount', 0)->default(0)->nullable();
      $table->float('order_amount', 0)->default(0)->nullable();
      $table->float('shipping_charge', 0)->default(0)->nullable();
      $table->string('name', 100);
      $table->string('phone_no', 20);
      $table->string('shipping_area', 50)->nullable();
      $table->text('shipping_address')->nullable();
      $table->string('payment_type', 50)->nullable()->comment('bkash,nagad,cash on delivery');
      $table->string('transaction_id', 100)->nullable();
      $table->string('email', 150)->nullable();
      $table->boolean('is_paid')->default(0);
      $table->boolean('is_confirm')->default(0);
      $table->boolean('is_seen_by_admin')->default(0);
      $table->unsignedInteger('admin_id')->default(0);

      $table->timestamps();
      $table->softDeletes();

      // $table->foreign('user_id')
      // ->references('id')->on('users')
      // ->onDelete('cascade');

      // $table->foreign('payment_id')
      // ->references('id')->on('payments')
      // ->onDelete('cascade');

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
