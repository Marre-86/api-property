<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\House;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Database\Seeders\HousesTableSeeder;

class HouseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use ValidatesOpenApiSpec;
    use RefreshDatabase;


    public function testGetAllHouses(): void
    {
        $this->seed(HousesTableSeeder::class);

        $response = $this->get('/api/v1/houses');

        $response
            ->assertStatus(200)
            ->assertJsonCount(9)                     //     или  ->assertJsonCount(House::all()->count())
            ->assertExactJson(House::all()->toArray());
    }

    public function testGetSingleHouse(): void
    {
        $this->seed(HousesTableSeeder::class);

        $response = $this->get('/api/v1/houses/1');

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => '1',
                'bedrooms' => 4,
                'name' => 'The Victoria',
        ]);
    }
}
