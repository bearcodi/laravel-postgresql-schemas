<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_it_works()
    {
        $this->get('/')->assertOk();
    }
}
