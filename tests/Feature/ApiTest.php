<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{

    public function test_the_api_returns_a_successful_response(): void
    {
        $response = $this->get('/api/quotes');

        $response->assertStatus(200);
    }

    public function test_the_api_returns_five_quotes(): void
    {
        $response = $this->get('/api/quotes');

        $response->assertJsonCount(5);
    }

    public function test_the_api_returns_non_identical_quotes(): void
    {
        $response = $this->get('/api/quotes');
        $secondResponse = $this->get('/api/quotes');

        $this->assertNotEquals($response, $secondResponse);
    }
}
