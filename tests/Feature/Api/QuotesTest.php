<?php

namespace Tests\Feature\Api;

use App\DataSource\DataSource;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\ApiTestCase;

class QuotesTest extends ApiTestCase
{
    public function test_the_api_returns_a_successful_response(): void
    {
        $response = $this->getDefaultResponse();

        $response->assertStatus(200);
    }

    public function test_the_endpoint_returns_correct_number_of_quotes(): void
    {
        $response = $this->getDefaultResponse();

        $this->assertCount(config('datasource.chunk_size'), $response['quotes']);
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

    public function test_the_endpoint_returns_consistent_pages(): void
    {
        $response = $this->getDefaultResponse('/api/quotes?page=3');
        $secondResponse = $this->getDefaultResponse('/api/quotes?page=3');

        $this->assertEquals($response['quotes'], $secondResponse['quotes']);
    }

    public function test_the_endpoint_can_use_different_sources(): void
    {
        $responseKanye = $this->getDefaultResponse();

        config(['datasource.default' => 'lorem-ipsum']);

        $responseLoremIpsum = $this->getDefaultResponse();

        $this->assertNotEquals($responseKanye['quotes'], $responseLoremIpsum['quotes']);

    }

}
