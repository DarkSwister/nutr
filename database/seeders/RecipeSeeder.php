<?php

namespace Database\Seeders;

use App\Imports\ImportRecipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ImportRecipe,
            'RAW_recipes.csv','public', \Maatwebsite\Excel\Excel::CSV);
    }
}
