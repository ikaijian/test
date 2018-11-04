<?php

use Faker\Generator as Faker;

$factory->define(App\Test::class, function (Faker $faker) {
    $arrSex=['男','女'];
    return [
        //
        'name'=>$faker->name(10),
        'sex'=>$arrSex[random_int(0,1)],
        'age'=>random_int(0,255),
    ];
});
