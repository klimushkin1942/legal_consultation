<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Request::firstOrCreate(
            [
                'status' => Request::NEW,
                'category_id' => Category::LAND_DISPUTES,
                'client_id' => 2,
                'content' => 'Что-то'
            ]
        );

        Request::firstOrCreate(
            [
                'status' => Request::NEW,
                'category_id' => Category::LABOR_DISPUTES,
                'client_id' => 3,
                'content' => 'Что-то'
            ]
        );

        Request::firstOrCreate(
            [
                'status' => Request::NEW,
                'category_id' => Category::FAMILY_DISPUTES,
                'client_id' => 4,
                'content' => 'Что-то'
            ]
        );

        Request::firstOrCreate(
            [
                'status' => Request::NEW,
                'category_id' => Category::FAMILY_DISPUTES,
                'client_id' => 5,
                'content' => 'Что-то'
            ]
        );
    }
}
