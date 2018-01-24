<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    // ２行追加。ダミーデータ生成に再現性を付加する
    static $seed = 24;
    $faker->seed($seed++);

    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title'   => $faker->realText(10),
        'content' => $faker->realText(250),
    ];
});
