<?php

namespace App\Imports;

use App\Models\Food;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportFood implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Food([
            "ndb_no"=>$row[0],
            "shrt_desc"=>$row[1],
            "water_g"=>$row[2],
            "energ_kcal"=>$row[3],
            "protein_g"=>$row[4],
            "lipid_tot_g"=>$row[5],
            "ash_g"=>$row[6],
            "carbohydrt_g"=>$row[7],
            "fiber_td_g"=>$row[8],
            "sugar_tot_g"=>$row[9],
            "calcium_mg"=>$row[10],
            "iron_mg"=>$row[11],
            "magnesium_mg"=>$row[12],
            "phosphorus_mg"=>$row[13],
            "potassium_mg"=>$row[14],
            "sodium_mg"=>$row[15],
            "zinc_mg"=>$row[16],
            "copper_mg"=>$row[17],
            "manganese_mg"=>$row[18],
            "selenium_µg"=>$row[19],
            "vit_c_mg"=>$row[20],
            "thiamin_mg"=>$row[21],
            "riboflavin_mg"=>$row[22],
            "niacin_mg"=>$row[23],
            "panto_acid_mg"=>$row[24],
            "vit_b6_mg"=>$row[25],
            "folate_tot_µg"=>$row[26],
            "folic_acid_µg"=>$row[27],
            "food_folate_µg"=>$row[28],
            "folate_dfe_µg"=>$row[29],
            "choline_tot_mg"=>$row[30],
            "vit_b12_µg"=>$row[31],
            "vit_a_iu"=>$row[32],
            "vit_a_rae"=>$row[33],
            "retinol_µg"=>$row[34],
            "alpha_carot_µg"=>$row[35],
            "beta_carot_µg"=>$row[36],
            "beta_crypt_µg"=>$row[37],
            "lycopene_µg"=>$row[38],
            "lut+zea_µg"=>$row[39],
            "vit_e_mg"=>$row[40],
            "vit_d_µg"=>$row[41],
            "vit_d_iu"=>$row[42],
            "vit_k_µg"=>$row[43],
            "fa_sat_g"=>$row[44],
            "fa_mono_g"=>$row[45],
            "fa_poly_g"=>$row[46],
            "cholestrl_mg"=>$row[47],
            "gmwt_1"=>$row[48],
            "gmwt_desc1"=>$row[49],
            "gmwt_2"=>$row[50],
            "gmwt_desc2"=>$row[51],
            "refuse_pct"=>$row[52]
        ]);
    }
}
