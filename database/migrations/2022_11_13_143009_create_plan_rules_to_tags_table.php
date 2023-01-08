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
        Schema::create('plan_rules_to_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_rule_id');
            $table->foreign('plan_rule_id')->references('id')->on('group_meal_plan_rules')->onDelete('set null');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->primary(['tag_id','plan_rule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_rules_to_tags');
    }
};
