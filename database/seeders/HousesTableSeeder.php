<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\House;


class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        House::truncate();

        House::create([
            'name' => 'The Victoria',
            'price' => 374662,
            'bedrooms' => 4,
            'bathrooms' => 2,
            'storeys' => 2,
            'garages' => 2,
        ]);

        House::create([
            'name' => 'The Xavier',
            'price' => 513268,
            'bedrooms' => 4,
            'bathrooms' => 2,
            'storeys' => 1,
            'garages' => 2,
        ]);

        House::create([
            'name' => 'The Como',
            'price' => 454990,
            'bedrooms' => 4,
            'bathrooms' => 3,
            'storeys' => 2,
            'garages' => 3,
        ]);

        House::create([
            'name' => 'The Aspen',
            'price' => 384356,
            'bedrooms' => 4,
            'bathrooms' => 2,
            'storeys' => 2,
            'garages' => 2,
        ]);

        House::create([
            'name' => 'The Lucretia',
            'price' => 572002,
            'bedrooms' => 4,
            'bathrooms' => 3,
            'storeys' => 2,
            'garages' => 2,
        ]);

        House::create([
            'name' => 'The Toorak',
            'price' => 521951,
            'bedrooms' => 5,
            'bathrooms' => 2,
            'storeys' => 1,
            'garages' => 2,
        ]);

        House::create([
            'name' => 'The Skyscape',
            'price' => 263604,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'storeys' => 2,
            'garages' => 2,
        ]);

        House::create([
            'name' => 'The Clifton',
            'price' => 386103,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'storeys' => 1,
            'garages' => 1,
        ]);

        House::create([
            'name' => 'The Geneva',
            'price' => 390600,
            'bedrooms' => 4,
            'bathrooms' => 3,
            'storeys' => 2,
            'garages' => 2,
        ]);
    }
}
