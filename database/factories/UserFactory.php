<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Category;
use App\Tag;
use App\Post;
use App\PostTag;
use App\Comment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'remember_token' => Str::random(10),
//     ];
// });


$factory->define(Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->word,
        'status' => rand(0,1),
        'user_id' => rand(1,3),
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'tag_name' => $faker->word,
        'status' => rand(0,1),
        'user_id' => rand(1,3),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,10),
        'user_id' => rand(1,3),
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'image' => $faker->imageUrl,
        'status' => rand(0,1),
        'user_id' => rand(1,10),
    ];
});

$factory->define(PostTag::class, function (Faker $faker) {
    return [
        'tag_id' => rand(1,10),
        'post_id' => rand(1,10),
    ];
});


$factory->define(Comment::class, function (Faker $faker) {
    return [
    	'user_id' => rand(1,3),
    	'post_id' => rand(1,10),
        'comment_body' => $faker->sentence,
        'status' => rand(0,1),
    ];
});
