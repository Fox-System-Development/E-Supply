<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_aplicacao_retornando(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
