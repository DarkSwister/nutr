<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = ['ndb_no', 'shrt_desc', 'water_g', 'energ_kcal', 'protein_g', 'lipid_tot_g', 'ash_g', 'carbohydrt_g', "fiber_td_g", 'sugar_tot_g', 'calcium_mg', 'iron_mg', 'magnesium_mg', 'phosphorus_mg', 'potassium_mg', 'sodium_mg', 'zinc_mg', 'copper_mg', 'manganese_mg', 'selenium_µg', 'vit_c_mg', 'thiamin_mg', 'riboflavin_mg', 'niacin_mg', 'panto_acid_mg', 'vit_b6_mg', 'folate_tot_µg', 'folic_acid_µg', 'food_folate_µg', 'folate_dfe_µg', 'choline_tot_mg', 'vit_b12_µg', 'vit_a_iu', 'vit_a_rae', 'retinol_µg', 'alpha_carot_µg', 'beta_carot_µg', 'beta_crypt_µg', 'lycopene_µg', 'lut', 'vit_e_mg', 'vit_d_µg', 'vit_d_iu', 'vit_k_µg', 'fa_sat_g', 'fa_mono_g', 'fa_poly_g', 'cholestrl_mg', 'gmwt_1', 'gmwt_desc1', 'gmwt_2', 'gmwt_desc2', 'refuse_pct'];
}
