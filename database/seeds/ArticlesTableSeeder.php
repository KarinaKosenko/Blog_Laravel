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
        $images = [
            'http://pulson.ru/wp-content/uploads/2013/03/pulson372.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson0224.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson274.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson333.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson2110.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson2010.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson1910.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson1513.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson1413.jpg',
            'http://pulson.ru/wp-content/uploads/2013/03/pulson1118.jpg',
        ];
        $faker = Faker\Factory::create('ru_RU');

        for($i = 0; $i < 10; $i++) {
            $newArticle = Article::create([
                'title' => $faker->realText(30),
                'content' => $faker->realText(500),
                'user_id' => 1,
                'image_link' => $images[$i],
            ]);
        }
    }
}
