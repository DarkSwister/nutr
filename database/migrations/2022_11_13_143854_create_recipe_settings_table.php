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
        Schema::create('recipe_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('recipe_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('public')->nullable();
            $table->boolean('show_nutrition')->nullable();
            $table->boolean('show_assets')->nullable();
            $table->boolean('landscape_view')->nullable();
            $table->boolean('disable_amount')->nullable();
            $table->boolean('disable_comments')->nullable();
            $table->boolean('locked')->nullable();
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
        Schema::dropIfExists('recipe_settings');
    }
};
