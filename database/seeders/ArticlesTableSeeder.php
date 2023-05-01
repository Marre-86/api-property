<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::truncate();

        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'title' => fake()->name(),
                'body' => fake()->paragraph(),
            ]);
        }
    }
}
