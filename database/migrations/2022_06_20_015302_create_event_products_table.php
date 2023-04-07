<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_products', function (Blueprint $table) {
            $table->id();
            $table->tinyinteger('offer_type')->comment('0=none, 1=gdisc, 2=daily');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_price');
            $table->unsignedInteger('unit_id');
            $table->float('discount')->default(0);
            $table->float('target_quantity')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->boolean('is_active')->default(0);
            $table->integer('admin_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_products');
    }
}
