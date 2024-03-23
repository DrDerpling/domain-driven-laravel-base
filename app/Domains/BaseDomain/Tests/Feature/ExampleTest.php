<?php

declare(strict_types=1);

namespace App\Domains\BaseDomain\Tests\Feature;

use App\Domains\BaseDomain\Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testTheApplicationReturnsASuccessfulResponse(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}