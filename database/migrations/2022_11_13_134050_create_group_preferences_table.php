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
        Schema::create('group_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->boolean('private_group')->nullable();
            $table->boolean('first_day_of_week')->nullable();
            $table->boolean('recipe_public')->nullable();
            $table->boolean('recipe_show_nutrition')->nullable();
            $table->boolean('recipe_show_assets')->nullable();
            $table->boolean('recipe_landscape_view')->nullable();
            $table->boolean('recipe_disable_comments')->nullable();
            $table->boolean('recipe_disable_amount')->nullable();
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
        Schema::dropIfExists('group_preferences');
    }
};
