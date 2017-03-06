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

$factory->define(\App\Domain\Users\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        //'media_id' => $faker->image(storage_path().'/app/public', 200, 200, 'food')
    ];
});

$factory->define(\App\Domain\Roles\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->firstNameFemale,
        'display_name' => $faker->name,
        'description' => $faker->sentence
    ];
});

$factory->define(\App\Domain\Clients\Clients::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement(array('Masculino', 'Feminino')),
        'cpf' => $faker->unique()->randomNumber(),
        'email'=> $faker->unique()->safeEmail,
        'phone'=> $faker->randomNumber(),
        'birthday'=> $faker->date(),
    ];
});

$factory->define(\App\Domain\Steps\Steps::class, function (Faker\Generator $faker){
    return [
        'completed' => false,
    ];
});

$factory->define(\App\Domain\Projects\Projects::class, function (Faker\Generator $faker){
    return [
        'description' => $faker->text(),
        'start_project' => $faker->date(),
        'completed' => false,

    ];
});

$factory->define(\App\Domain\Justifications\Justifications::class, function (Faker\Generator $faker){
    return [
        'date' => $faker->date(),
        'text' => $faker->text(),
    ];
});
