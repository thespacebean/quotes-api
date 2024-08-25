<?php

namespace Tests\Feature\Api;

use Illuminate\Support\Facades\Cache;
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

    public function test_the_json_structure_is_correct(): void
    {
        $response = $this->getDefaultResponse();

        $response->assertExactJsonStructure([
            'quotes',
            'page',
            'count',
            'total_pages',
        ]);
    }

}
