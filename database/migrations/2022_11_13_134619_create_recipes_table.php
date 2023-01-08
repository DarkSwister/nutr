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
        Schema::create('recipes', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignId('group_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->string('total_time')->nullable();
            $table->string('prep_time')->nullable();
            $table->string('perform_time')->nullable();
            $table->string('cook_time')->nullable();
            $table->string('recipe_yield')->nullable();
            $table->string('recipeCuisine')->nullable();
            $table->integer('rating')->nullable();
            $table->string('org_url')->nullable();
            $table->boolean('is_ocr_recipe')->default(false)->nullable();
            $table->date('date_added')->nullable();
            $table->dateTime('date_updated')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('instructions')->nullable();
            $table->json('properties')->nullable();
            $table->unsignedInteger('external_id')->nullable();
            $table->timestamps();
            $table->unique(['slug', 'group_id'], 'recipe_slug_group_id_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
