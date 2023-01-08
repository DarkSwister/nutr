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
        Schema::create('user_meal_plans', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('entry_type')->index();
            $table->string('title')->index();
            $table->text('text')->index();
            $table->foreignId('user_id')->index()->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('recipe_id')->index()->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('group_meal_plans');
    }
};
