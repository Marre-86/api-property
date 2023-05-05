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

    public function testSearchQuery1(): void
    {
        $this->seed(HousesTableSeeder::class);

        $response = $this->get('/api/v1/houses?filter[price-gte]=500000');

        $response
            ->assertStatus(200)
            ->assertJsonCount(3)
            ->assertExactJson(House::where('price', '>', 500000)->get()->toArray());
    }

    public function testSearchQuery2(): void
    {
        $this->seed(HousesTableSeeder::class);

        $response = $this->get('/api/v1/houses?filter[price-lte]=400000&filter[garages]=2&filter[bathrooms]=2');

        $response
            ->assertStatus(200)
            ->assertJsonCount(3)
            ->assertExactJson(House::where('price', '<', 400000)
                                    ->where('garages', 2)
                                    ->where('bathrooms', 2)
                                    ->get()->toArray());
    }

    public function testSearchQuery3(): void
    {
        $this->seed(HousesTableSeeder::class);

        $response = $this->get('/api/v1/houses?filter[name]=Sky');

        $response
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertExactJson(House::where('name', 'like', '%Sky%')->get()->toArray());
    }

    public function testSearchQuery4(): void
    {
        $this->seed(HousesTableSeeder::class);

        $response = $this->get('/api/v1/houses?filter[bedrooms]=4&filter[storeys]=1');

        $response
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertExactJson(House::where('bedrooms', 4)->where('storeys', 1)->get()->toArray());
    }

    public function testSearchQuery5(): void
    {
        $this->seed(HousesTableSeeder::class);
   // в будущем нужно разобраться как описывать пустые респонсы в Openapi и удалить нижеследующую строчку
        $this->withoutResponseValidation();
        $response = $this->get('/api/v1/houses?filter[name]=Slava');

        $response
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJson([
                'message' => 'No items with these parameters.'
        ]);
    }

    public function testAddHouse(): void
    {
        $this->seed(HousesTableSeeder::class);
        $newHouse = [
            'name' => 'The Jarro',
            'price' => 667676,
            'bedrooms' => 4,
            'bathrooms' => 2,
            'storeys' => 1,
            'garages' => 1,
        ];

        $response = $this->postJson('/api/v1/houses', $newHouse);

        $response
            ->assertStatus(201)
            ->assertJson($newHouse);
    }

    public function testAddHouseBadRequest(): void
    {
        // отключаем валидацию реквеста, поскольку смысл теста - именно проверить не соответсующий API реквест
        $this->withoutRequestValidation();

        $this->seed(HousesTableSeeder::class);
        $newHouse = [
            'name' => 'The Correo',
            'price' => 667676,
            'bedrooms' => 4,
        ];

        $response = $this->postJson('/api/v1/houses', $newHouse);

        $response
            ->assertStatus(400);
    }

    public function testUpdateHouse(): void
    {
        $this->seed(HousesTableSeeder::class);
        $updatedValues = [
            'name' => 'The Kyiv',
            'price' => 8888,
        ];

        $response = $this->putJson('/api/v1/houses/9', $updatedValues);

        $response
            ->assertStatus(200)
            ->assertJson($updatedValues);
    }

    public function testUpdateHouseWrongId(): void
    {
        $this->seed(HousesTableSeeder::class);
        $updatedValues = [
            'name' => 'The Lviv',
            'price' => 432,
        ];

        $response = $this->putJson('/api/v1/houses/978', $updatedValues);

        $response
            ->assertStatus(404);
    }

    public function testDeleteHouse(): void
    {
        $this->seed(HousesTableSeeder::class);

        $response = $this->deleteJson('/api/v1/houses/9');

        $response
            ->assertStatus(204);

        $this->assertDatabaseCount('houses', 8);
        $this->assertDatabaseMissing('houses', [
            'name' => 'The Geneva',
        ]);
    }
}
