<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::firstOrCreate(
            ['name' => 'Земельные споры'],
        );

        Category::firstOrCreate(
            ['name' => 'Семейные споры'],
        );

        Category::firstOrCreate(
            ['name' => 'Трудовые споры'],
        );

        Category::firstOrCreate(
            ['name' => 'ГИБДД споры'],
        );
    }
}
