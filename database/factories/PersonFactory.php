<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mail' => $faker->email,
        'age' => $faker->numberBetween(1, 100)
    ];
});

$factory->state(Person::class, 'upper', function ($faker) {
    return [
        'name' => mb_strtoupper($faker->name)
    ];
});

$factory->state(Person::class, 'lower', function ($faker) {
    return [
        'name' => mb_strtolower($faker->name)
    ];
});

$factory->afterMaking(Person::class, function ($person, $faker) {
    $person->name .= ' [making]';
    $person->save();
});

$factory->afterCreating(Person::class, function ($person, $faker) {
    $person->name .= ' [creating]';
    $person->save();
});

$factory->afterMakingState(Person::class, 'upper', function ($person, $faker) {
    $person->name .= ' [making state]';
    $person->save();
});

$factory->afterCreatingState(Person::class, 'lower', function ($person, $faker) {
    $person->name .= ' [creating state]';
    $person->save();
});
