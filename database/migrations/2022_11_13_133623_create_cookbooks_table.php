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
        Schema::create('cookbooks', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->boolean('public')->nullable();
            $table->boolean('require_all_tags')->nullable();
            $table->boolean('require_all_tools')->nullable();
            $table->boolean('require_all_categories')->nullable();
            $table->foreignId('group_id')->nullable()->constrained()->onDelete('set null');
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
        Schema::dropIfExists('cookbooks');
    }
};
