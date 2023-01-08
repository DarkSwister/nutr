<?php

return [
    'nutrition' => [
        'men' => [
            'calories' => 2500,
            'fat_content' => 1,
            'fiber_content' => 1,
            'protein_content' => 52,
            'carbohydrate_content' => 1,
            'sodium_content' => 1,
            'sugar_content' => 1,
            'vitamin_d',
            'calcium',
            'iron',
            'potassium'
        ],
        'women' => [
            'calories' => 2000,
            'fat_content' => 'Total Fat',
            'sugar_content' => 'Sugars',
            'sodium_content' => 'Sodium', //mg
            'protein_content' => 'Protein',
            'saturated_fat' => 'Saturated fat',
            'carbohydrate_content' => 'Total Carbohydrate',
            'fiber_content' => 'Dietary Fiber',

        ],

    ],
    'labels' => [
        'calories' => 'Calories',
        'fat_content' => 'Total Fat',
        'sugar_content' => 'Sugars',
        'sodium_content' => 'Sodium', //mg
        'protein_content' => 'Protein',
        'saturated_fat' => 'Saturated fat',
        'carbohydrate_content' => 'Total Carbohydrate',
        'dietary_fiber_content' => 'Dietary Fiber',

    ],
    'names_order' => [
        'calories', 'fat_content', 'saturated_fat', 'sodium_content', 'carbohydrate_content', 'protein_content'
    ]
];
