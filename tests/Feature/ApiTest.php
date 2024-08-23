<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();

        Http::fake([
            'https://api.kanye.rest/*' => Http::response($this->getExampleQuotes()),
        ]);
    }
    public function test_the_api_returns_a_successful_response(): void
    {
        $response = $this->getDefaultResponse();

        $response->assertStatus(200);
    }

    public function test_the_api_returns_five_quotes(): void
    {
        $response = $this->getDefaultResponse();

        $this->assertCount(5, $response['quotes']);
    }

    public function test_the_api_returns_non_identical_quotes(): void
    {
        $response = $this->getDefaultResponse();
        $secondResponse = $this->getDefaultResponse();

        $this->assertNotEquals($response['quotes'], $secondResponse['quotes']);
    }

    public function test_the_api_returns_error_without_token(): void
    {
        $response = $this->get('/api/quotes');

        $response->assertStatus(401);
    }

    private function getExampleQuotes(): array
    {
        return [
            "All you have to be is yourself",
            "Believe in your flyness...conquer your shyness.",
            "Burn that excel spread sheet",
            "Decentralize",
            "Distraction is the enemy of vision",
            "Everything you do in life stems from either fear or love",
            "For me giving up is way harder than trying.",
            "For me, money is not my definition of success. Inspiring people is a definition of success",
            "Fur pillows are hard to actually sleep on",
            "George Bush doesn't care about black people",
            "Have you ever thought you were in love with someone but then realized you were just staring in a mirror for 20 minutes?",
            "I care. I care about everything. Sometimes not giving a f#%k is caring the most.",
            "I feel calm but energized",
            "I feel like I'm too busy writing history to read it.",
        ];
    }

    private function getDefaultResponse()
    {
        return $this->withHeaders(['Authorization' => 'Something'])
            ->getJson('/api/quotes');
    }
}
