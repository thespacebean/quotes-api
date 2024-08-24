<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Http;

abstract class ApiTestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();

        Http::fake([
            'https://api.kanye.rest/*' => Http::response($this->getExampleQuotes()),
        ]);
    }

    public function getDefaultResponse(?string $uri = '/api/quotes'): \Illuminate\Testing\TestResponse
    {
        return $this->withHeaders(['Authorization' => 'Bearer '.env('API_TOKEN')])
            ->getJson($uri);
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

}
