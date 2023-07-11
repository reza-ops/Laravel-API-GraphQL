<?php

namespace Tests\Feature;

use App\Models\Phone;
use Illuminate\Http\Response;
use Tests\TestCase;

class PhoneTest extends TestCase
{
    public function test_user_can_create_phone(): void
    {
        $response = $this->postJson('/api/phones',
            [
                'name' => 'test-name',
                'description' => 'test-description',
                'price' => 1000,
            ]);

        $response
            ->assertStatus(201);

        // check database
        $this->assertDatabaseHas('phones', [
            'name' => 'test-name',
            'description' => 'test-description',
            'price' => 1000,
        ]);

        // delete data test
        Phone::where('name', 'test-name')->delete();
    }

    public function test_validation_create_phones(): void
    {
        $response = $this->postJson('/api/phones',
            [
                'name' => null,
                'description' => null,
                'price' => null,
            ]);

        $response
            ->assertStatus(400);
    }

    public function test_user_can_get_data_phone(): void
    {
        $this->json('get', 'api/phones')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'price',
                    ],
                ],
            ]);
    }

    public function test_user_can_update_phone(): void
    {
        // create phone
        $phone = Phone::create(
            [
                'name' => 'test-name',
                'description' => 'test-description',
                'price' => 1000,
            ]
        );

        $response = $this->putJson('/api/phones/'.$phone->id,
            [
                'name' => 'test-name-update',
                'description' => 'test-description-update',
                'price' => 10001,
            ]);

        $response
            ->assertStatus(200);

        // check database
        $this->assertDatabaseHas('phones', [
            'name' => 'test-name-update',
            'description' => 'test-description-update',
            'price' => 10001,
            'id' => $phone->id,
        ]);

        // delete data test
        Phone::where('id', $phone->id)
            ->delete();
    }

    public function test_validation_delete_phones(): void
    {
        // create phone
        $phone = Phone::create(
            [
                'name' => 'test-name',
                'description' => 'test-description',
                'price' => 1000,
            ]
        );
        $response = $this->getJson('/api/phones-delete/'.$phone->id);

        $this->assertDatabaseMissing('phones', [
            'id' => $phone->id,
        ]);

        $response
            ->assertStatus(200);
    }
}
