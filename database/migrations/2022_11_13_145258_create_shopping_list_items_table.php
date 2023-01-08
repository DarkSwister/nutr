<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_list_id')->constrained()->onDelete('cascade');
            $table->boolean('is_ingredient')->nullable();
            $table->integer('position');
            $table->boolean('checked')->nullable();
            $table->float('quantity')->nullable();
            $table->text('note')->nullable();
            $table->boolean('is_food')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('ingredient_units')->onDelete('set null');
            $table->unsignedBigInteger('food_id')->nullable();
            $table->foreign('food_id')->references('id')->on('ingredient_foods')->onDelete('set null');
            $table->unsignedBigInteger('label_id')->nullable();
            $table->foreign('label_id')->references('id')->on('multi_purpose_labels')->onDelete('set null');
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
        Schema::dropIfExists('shopping_list_items');
    }
};
