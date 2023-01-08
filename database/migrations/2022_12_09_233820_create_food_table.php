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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->integer("ndb_no")->nullable()->index();
            $table->text("shrt_desc")->nullable()->index();
            $table->float("water_g")->nullable();
            $table->integer("energ_kcal")->nullable();
            $table->float("protein_g")->nullable();
            $table->float("lipid_tot_g")->nullable();
            $table->float("ash_g")->nullable();
            $table->float("carbohydrt_g")->nullable();
            $table->float("fiber_td_g")->nullable();
            $table->float("sugar_tot_g")->nullable();
            $table->integer("calcium_mg")->nullable();
            $table->float("iron_mg")->nullable();
            $table->integer("magnesium_mg")->nullable();
            $table->integer("phosphorus_mg")->nullable();
            $table->integer("potassium_mg")->nullable();
            $table->integer("sodium_mg")->nullable();
            $table->float("zinc_mg")->nullable();
            $table->float("copper_mg")->nullable();
            $table->float("manganese_mg")->nullable();
            $table->float("selenium_µg")->nullable();
            $table->float("vit_c_mg")->nullable();
            $table->float("thiamin_mg")->nullable();
            $table->float("riboflavin_mg")->nullable();
            $table->float("niacin_mg")->nullable();
            $table->float("panto_acid_mg")->nullable();
            $table->float("vit_b6_mg")->nullable();
            $table->integer("folate_tot_µg")->nullable();
            $table->integer("folic_acid_µg")->nullable();
            $table->integer("food_folate_µg")->nullable();
            $table->integer("folate_dfe_µg")->nullable();
            $table->float("choline_tot_mg")->nullable();
            $table->float("vit_b12_µg")->nullable();
            $table->integer("vit_a_iu")->nullable();
            $table->integer("vit_a_rae")->nullable();
            $table->integer("retinol_µg")->nullable();
            $table->integer("alpha_carot_µg")->nullable();
            $table->integer("beta_carot_µg")->nullable();
            $table->integer("beta_crypt_µg")->nullable();
            $table->integer("lycopene_µg")->nullable();
            $table->integer("lut+zea_µg")->nullable();
            $table->float("vit_e_mg")->nullable();
            $table->float("vit_d_µg")->nullable();
            $table->integer("vit_d_iu")->nullable();
            $table->float("vit_k_µg")->nullable();
            $table->float("fa_sat_g")->nullable();
            $table->float("fa_mono_g")->nullable();
            $table->float("fa_poly_g")->nullable();
            $table->integer("cholestrl_mg")->nullable();
            $table->float("gmwt_1")->nullable();
            $table->string("gmwt_desc1")->nullable();
            $table->float("gmwt_2")->nullable();
            $table->string("gmwt_desc2")->nullable();
            $table->integer("refuse_pct")->nullable();
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
        Schema::dropIfExists('foods');
    }
};
