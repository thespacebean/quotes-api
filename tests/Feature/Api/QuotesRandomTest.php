<?php

namespace Tests\Feature\Api;

use Tests\ApiTestCase;

class QuotesRandomTest extends ApiTestCase
{
    public function test_the_endpoint_returns_a_successful_response(): void
    {
        $response = $this->getDefaultResponse('/api/quotes/random');

        $response->assertStatus(200);
    }

    public function test_the_endpoint_returns_five_quotes(): void
    {
        $response = $this->getDefaultResponse('/api/quotes/random');

        $this->assertCount(5, $response['quotes']);
    }

    public function test_the_random_quotes_endpoint_returns_non_identical_quotes(): void
    {
        $response = $this->getDefaultResponse('/api/quotes/random');
        $secondResponse = $this->getDefaultResponse('/api/quotes/random');

        $this->assertNotEquals($response['quotes'], $secondResponse['quotes']);
    }

    public function test_the_api_returns_error_without_token(): void
    {
        $response = $this->get('/api/quotes/random');

        $response->assertStatus(401);
    }

}
