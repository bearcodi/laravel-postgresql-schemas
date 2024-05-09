<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function test_it_lists_schemas()
    {
        $schemas = db_list_schemas();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $schemas);        
    }
}