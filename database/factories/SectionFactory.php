<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    $filepath = 'public/storage/logo';

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }

    return [
        'name' => $faker->company(),
        'description' => $faker->text(),
        'logo' => $faker->image($filepath, 300, 300, null, false)
    ];
});
