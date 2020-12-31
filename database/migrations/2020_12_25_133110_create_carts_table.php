<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('breakfast_price')->nullable();
            $table->string('lunch_price')->nullable();
            $table->string('dinner_price')->nullable();
            $table->string('no_of_person')->nullable();
            $table->string('no_of_days')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('coupon_id')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('after_discount')->nullable();
            $table->string('tax')->nullable();
            $table->string('total')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('delivery_dates')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('carts');
    }
}
