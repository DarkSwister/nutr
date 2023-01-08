<?php

namespace Database\Seeders;

use App\Imports\ImportFood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ImportFood,
            'food.xlsx','public', \Maatwebsite\Excel\Excel::XLSX);
    }
}
