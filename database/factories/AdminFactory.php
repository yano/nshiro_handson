<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {

    // ２行追加。ダミーデータ生成に再現性を付加する
    static $seed = 19;
    $faker->seed($seed++);

    return [
        'username' => $faker->name,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
