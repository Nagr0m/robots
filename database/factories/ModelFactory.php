<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Robot::class, function (Faker\Generator $faker) {

    $names = [
            'Alan',
            'Albert',
            'RDX',
            'Anthony-R',
            'Ben-RD',
            'R2-D2',
            'C-3PO',
            'J-RD',
            'Astro Boy',
            'T-800',
            'WALL-E',
            'EVE',
            'M-O',
            'Ultron',
            'C.H.E.E.S.E',
            'Nono'
    ];

    $name = $names[array_rand($names)];
  
    $category = rand(1, 3);
    $user = rand(1, 2);
    $power = rand(0, 100);

  	return [
      	    'name'         => $name,
            'category_id'  => $category,
            'user_id'      => $user,
            'power'      => $power,
            'slug' 		   => str_slug($name),
            'description'  => $faker->paragraph(rand(5, 20)),
            'published_at' => $faker->unixTime(),
            'status'       => 'published',
      ];
  
});
