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
        Schema::create('group_data_exports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('filename');
            $table->string('path');
            $table->string('size');
            $table->string('expires');
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
        Schema::dropIfExists('group_data_exports');
    }
};
