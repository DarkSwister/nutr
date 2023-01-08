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
        Schema::create('shopping_list_recipe_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_list_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('recipe_id')->constrained()->onDelete('cascade');
            $table->float('recipe_quantity');
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
        Schema::dropIfExists('shopping_list_recipe_references');
    }
};
