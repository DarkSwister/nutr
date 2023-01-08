<?php

namespace App\Http\Services;

use App\Models\Recipe;

class RecipeService
{
    public function parseIngredientCount(Recipe $recipe)
    {
        // Initialize an array to store the ingredient counts
        $ingredientCounts = array();

        // Split the recipe into individual lines
        $lines = explode("\n", $recipe->ingredients);
        dd($lines);
        // Loop through each line in the recipe
        foreach ($lines as $line) {
            // Use a regular expression to match the ingredient count in the line
            preg_match('/^\d+/', $line, $matches);

            // If a match was found, add it to the array of ingredient counts
            if (count($matches) > 0) {
                $ingredientCounts[] = $matches[0];
            }
        }
        dd($ingredientCounts);
        // Return the array of ingredient counts
        return $ingredientCounts;
    }

    public function parse()
    {
        // Define the regular expression pattern to match ingredient quantities, units, and names
        $pattern = '/^(\d+(?:\.\d+)?\s*(?:[a-zA-Z]+)?)(?:\s*-\s*)?([\w\s]+)/';
//        $pattern = '/^(\d+[\s\/\d]*)\s*(.*)$/';
//        $regex = '/\d+\s*(?:[\d\/\s]+)?(?:[A-Z][a-z]*)?\s*(?:[a-z]+)?/';
//        $regex = '/^\d+(?:\/\d+)?/';
        // Define the recipe's ingredients list
        $ingredients = "2 cups flour
            1 tsp salt
            1/2 cup sugar
            1/4 cup butter, melted
            1 egg
            1/2 cup milk
            1 tsp vanilla extract
            1 tsp baking powder";

// Use preg_match_all to find all matches of the pattern in the ingredients list
        preg_match_all($pattern, $ingredients, $matches, PREG_SET_ORDER);

// Loop through each ingredient and print the quantity, unit, and name
        foreach ($matches as $ingredient) {
            $quantity = $ingredient[1];
            $unit = $ingredient[2];
            $name = $ingredient[3];
        }

    }

    public function parseRecipe(Recipe $recipe)
    {
        $ingredients = [
            "1 cup sugar",
            "2 tablespoons flour",
            "3 teaspoons salt"
        ];

        $pattern = '/\d+\s*(cup|tablespoon|teaspoon)\s*\w+/';
//        $pattern = "/^\d+\s+(cup|tbsp|tsp)/i";
//        $pattern = '/\d+\s*(?:[\d\/\s]+)?(?:[A
//-Z][a-z]*)?\s*(?:[a-z]+)?/';
//        $pattern = '/\d+\s*\w+\s*\s*\w+/';
        foreach ($ingredients as $ingredient) {
            preg_match_all($pattern, $ingredient, $matches);
            if (count($matches) > 0) {
                dd($matches);
                // The ingredient matches the pattern, so we can parse it
                // to extract the quantity, unit, and name
                $quantity = $matches[0][0];
                $unit = $matches[1][0];
                $name = $matches[2][0] ?? '';

                // Do something with the parsed ingredient information
                dump("Ingredient: $quantity $unit $name\n");
            }
        }
    }
//if (preg_match("/^\d+\s+(cup|tbsp|tsp)/i", $line, $matches)) {


}
