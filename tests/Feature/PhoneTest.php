<?php

namespace Tests\Feature;

use App\Models\Phone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
