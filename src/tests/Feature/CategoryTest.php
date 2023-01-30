<?php

namespace Saman\BarekatElectronicHealth\tests\Feature;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Category Test
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}