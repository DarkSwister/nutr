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
        Schema::create('plan_rules_to_categories', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('group_plan_rule_id');
            $table->foreign('group_plan_rule_id')->references('id')->on('group_meal_plan_rules')->onDelete('set null');;
            $table->timestamps();
            $table->primary(['category_id','group_plan_rule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_rules_to_categories');
    }
};
