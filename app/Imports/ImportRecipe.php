<?php

namespace App\Imports;

use App\Models\Recipe;
use App\Models\Tag;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Row;
use Str;

class ImportRecipe implements OnEachRow, WithChunkReading
{
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        $tags = $this->columnToArray($row[5]);
        $nutrition = $this->columnToArray($row[6]);

        $recipe = Recipe::create([
            'name' => ucfirst($row[0]),
            'total_time' => $row[2],

//            'date_added' => $row[4],
            'instructions' => array_map(function ($value) {
                return str_replace([" '", "'"], "", $value);
            }, str_getcsv(str_replace(", '", "; '", $row[8]), ";")),
//            'instructions' => collect($row[8]),
            'description' => $row[9],
            'ingredients' => $this->columnToArray($row[10]),
            'properties' => [
                'steps_count' => $row[7],
                'ingredients_count' => $row[11]
            ],
            'external_id' => $row[1]
        ]);
        foreach ($tags as $tag) {
            $tag = Tag::updateOrCreate(['name' => Str::headline($tag)], ['name' => Str::headline($tag)]);
            $recipe->tags()->attach($tag);

        }
        $recipe->nutrition()->create([
            'calories' => $nutrition[0] ?? null,
            'fat_content' => $nutrition[1] ?? null,
            'sugar_content' => $nutrition[2] ?? null,
            'sodium_content' => $nutrition[3] ?? null,
            'protein_content' => $nutrition[4] ?? null,
            'saturated_fat' => $nutrition[5] ?? null,
            'carbohydrate_content' => $nutrition[6] ?? null,
//                'fiber_content' => $nutrition[0],

        ]);
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    private function columnToArray(string $contArray): array
    {

        return array_map(function ($value) {
            return trim(str_replace("'", '', $value));
        }, str_getcsv($contArray));

    }
}
