<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\answers::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'gender' => $faker->randomElement($gender = array(1,2)),
        'age_id' =>$faker->randomElement($age = array('10代以下','20代','30代','40代','50代','60代以上')),
        'email' => $faker->email,
        'is_send_email' =>$faker->randomElement($permission = array(0,1)),
        'feedback' => $faker->sentence,
        'updated_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'created_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
