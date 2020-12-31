<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->default('0');
            $table->string('package_title_arabic')->nullable();
            $table->string('package_title_english')->nullable();
            $table->string('descripion_arabic')->nullable();
            $table->string('descripion_english')->nullable();
            $table->string('breakfast_enable')->nullable();
            $table->string('lunch_enable')->nullable();
            $table->string('dinner_enable')->nullable();
            $table->string('breakfast_price')->nullable();
            $table->string('lunch_price')->nullable();
            $table->string('dinner_price')->nullable();
            $table->TEXT('breakfast_sunday_items')->nullable();
            $table->TEXT('breakfast_monday_items')->nullable();
            $table->TEXT('breakfast_tuesday_items')->nullable();
            $table->TEXT('breakfast_wednesday_items')->nullable();
            $table->TEXT('breakfast_thursday_items')->nullable();
            $table->TEXT('breakfast_friday_items')->nullable();
            $table->TEXT('breakfast_saturday_items')->nullable();
            $table->TEXT('lunch_sunday_items')->nullable();
            $table->TEXT('lunch_monday_items')->nullable();
            $table->TEXT('lunch_tuesday_items')->nullable();
            $table->TEXT('lunch_wednesday_items')->nullable();
            $table->TEXT('lunch_thursday_items')->nullable();
            $table->TEXT('lunch_friday_items')->nullable();
            $table->TEXT('lunch_saturday_items')->nullable();
            $table->TEXT('dinner_sunday_items')->nullable();
            $table->TEXT('dinner_monday_items')->nullable();
            $table->TEXT('dinner_tuesday_items')->nullable();
            $table->TEXT('dinner_wednesday_items')->nullable();
            $table->TEXT('dinner_thursday_items')->nullable();
            $table->TEXT('dinner_friday_items')->nullable();
            $table->TEXT('dinner_saturday_items')->nullable();
            $table->string('kitchen_ids')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('food_packages');
    }
}
