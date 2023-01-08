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
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('recipe_id')->constrained()->onDelete('cascade');
            $table->integer('position')->nullable();
            $table->string('title')->nullable();
            $table->text('note')->nullable();
            $table->string('original_text')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('ingredient_units')->onDelete('set null');
            $table->unsignedBigInteger('food_id')->nullable();
            $table->foreign('food_id')->references('id')->on('ingredient_foods')->onDelete('set null');
            $table->float('quantity')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();

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
        Schema::dropIfExists('recipe_ingredients');
    }
};
