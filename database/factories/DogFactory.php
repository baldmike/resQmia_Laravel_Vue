<?php

use App\Models\Dog;
use Faker\Generator as Faker;

$factory->define(Dog::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'weight' => $faker->numberBetween($min=1, $max=80),
        'exam' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'deworming_1' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'deworming_2' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'fecal_test' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'heartworm_test' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'heartworm_result' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'spay_neuter' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'distemper_1' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'distemper_2' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'distemper_3' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'lepto_1' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'lepto_2' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'bord' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'civ' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'rabies' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'rabies_number' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'vet' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'microchip' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'heartworm' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'flea_tick' => $faker->realText($maxNbChars = 10, $indexSize = 1),
        'image' => $faker->url(),

    ];
});
