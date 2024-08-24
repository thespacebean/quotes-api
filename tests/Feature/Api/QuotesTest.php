<?php

namespace Tests\Feature\Api;

use Tests\ApiTestCase;

class QuotesTest extends ApiTestCase
{
    public function test_the_api_returns_a_successful_response(): void
    {
        $response = $this->getDefaultResponse();

        $response->assertStatus(200);
    }

    public function test_the_endpoint_returns_five_quotes(): void
    {
        $response = $this->getDefaultResponse();

        $this->assertCount(5, $response['quotes']);
    }

    public function test_the_endpoint_returns_error_without_token(): void
    {
        $response = $this->get('/api/quotes');

        $response->assertStatus(401);
    }

}
