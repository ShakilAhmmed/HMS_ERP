<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
$factory->define(User::class, function (Faker $faker) {
    return [
        'users_name'=>Str::random(10),
        'guardian_name'=>Str::random(10),
        'address'=>$faker->city(),
        'phone'=>$faker->tollFreePhoneNumber(),
        'sex'=>$faker->randomElement([1, 2,3]),
        'birth_date'=>$faker->dateTime(),
         'age'=>$faker->randomElement([10, 20,30]),
         'blood_group'=>$faker->randomElement(['B+', 'O+','A']),
         'status'=>$faker->randomElement([1, 2]),
         'image'=>'backend_assets/assets/images/users/1571467753.jpeg',
        'email'=>Str::random(10).'@gmail.com',
        'password'=>Hash::make('123456789'),
        'type'=>'9'
    ];
});
