<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('kitchen_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('description')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('min_order_val')->nullable();
            $table->string('max_value')->nullable();
            $table->string('limit_per_user')->nullable();
            $table->string('limit_per_coupon')->nullable();
            $table->string('user_type')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
