<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Project;
use App\Role;
use App\State;
use App\Task;
use App\User;
use App\Workspace;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    $gender = $faker->randomElement([User::GENDER_FEMALE, User::GENDER_MALE, User::GENDER_UNKNOWN]);

    return [
        'username' => $faker->unique()->userName,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'verified' => $verified = $faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
        'gender' =>  $gender,
        'remember_token' => Str::random(10),
        'verification_token' =>  $verified == User::VERIFIED_USER ? null : User::generateVerificationCode(),
        'role_id' => Role::all()->random()->id,
    ];
});

$factory->define(Workspace::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word()),
        'body' => $faker->paragraph(1),
        'user_id' => User::all()->random()->id,
    ];
});

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word()),
        'body' => $faker->paragraph(1),
        'user_id' => User::all()->random()->id,
        'workspace_id' => Workspace::all()->random()->id,
    ];
});


$factory->define(Task::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(2),
        'level' => $faker->randomElement([ Task::LEVEL_NOT_URGENT, task::LEVEL_URGENT ]),
        'state_id' => State::all()->random()->id,
        'project_id' => Project::all()->random()->id,
        'user_id' => User::all()->random()->id,
        
    ];
});


$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(2),
       
        'task_id' => Task::all()->random()->id,

    ];
});

