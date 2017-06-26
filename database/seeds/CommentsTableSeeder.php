<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        $newComment = Comment::create([
            'text' => $faker->realText(50),
            'user_id' => 1,
            'article_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        $newComment = Comment::create([
            'text' => $faker->realText(50),
            'user_id' => 2,
            'parent_id' => 1,
            'article_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        $newComment = Comment::create([
            'text' => $faker->realText(50),
            'user_id' => 1,
            'parent_id' => 2,
            'article_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        $newComment = Comment::create([
            'text' => $faker->realText(50),
            'user_id' => 4,
            'parent_id' => 1,
            'article_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        $newComment = Comment::create([
            'text' => $faker->realText(50),
            'user_id' => 3,
            'article_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        }
}
