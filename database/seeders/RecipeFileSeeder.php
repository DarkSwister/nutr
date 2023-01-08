<?php

namespace Database\Seeders;

use App\Jobs\LoadChunk;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use JsonMachine\Items;
use Ramsey\Uuid\Uuid;

class RecipeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->callFile(asset('dataset/recipes_raw_nosource_epi.json'));
//        $this->callFile(asset('dataset/recipes_raw_nosource_fn.json'));
    }

    private function callFile($asset)
    {
        $recipes = Items::fromFile($asset);
        foreach ($recipes as $key => $value) {
            try {

                Recipe::create([
                    'name' => $value->title ?? null,
//                    'image' => $value->picture_link ?? null,
                    'ingredients' => collect($value->ingredients) ?? null,
                    'instructions' => $value->instructions ?? null,
                ]);
            } catch (\Exception $e) {
                dd($e);
            }
        }
    }

}
