<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DepartmentModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(DepartmentModel::class, function (Faker $faker) {
    return [
        'department_name'=>Str::random(10),
        'description'=>Str::random(100),
        'status'=>$faker->randomElement([1, 2])
    ];
});
