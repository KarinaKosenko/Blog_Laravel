<?php

use Illuminate\Database\Seeder;
use App\Models\Article;


class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for($i = 0; $i < 10; $i++) {
            $newArticle = Article::create([
                'title' => $faker->realText(30),
                'content' => $faker->realText(200),
                'user_id' => 1,
            ]);
        }
    }
}
