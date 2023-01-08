<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_list_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_list_id')->constrained()->onDelete('cascade');
            $table->string('key_name')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });
        Schema::create('ingredient_food_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingredient_food_id')->constrained()->onDelete('cascade');
            $table->string('key_name')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });
        Schema::create('shopping_list_item_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_list_item_id')->constrained()->onDelete('cascade');
            $table->string('key_name')->nullable();
            $table->string('value')->nullable();
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
        Schema::dropIfExists('shopping_list_extras');
        Schema::dropIfExists('ingredient_food_extras');
        Schema::dropIfExists('shopping_list_item_extras');
    }
};
