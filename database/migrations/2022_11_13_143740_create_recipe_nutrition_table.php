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
        Schema::create('recipe_nutrition', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('recipe_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedDecimal('calories')->nullable(); //energy
            $table->unsignedDecimal('fat_content')->nullable(); //%
            $table->unsignedDecimal('saturated_fat')->nullable(); //%
            $table->unsignedDecimal('sodium_content')->nullable(); //%
            $table->unsignedDecimal('carbohydrate_content')->nullable(); //%
            $table->unsignedDecimal('dietary_fiber_content')->nullable(); //%
            $table->unsignedDecimal('sugar_content')->nullable(); //%
            $table->unsignedDecimal('protein_content')->nullable(); //%

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
        Schema::dropIfExists('recipe_nutrition');
    }
};
