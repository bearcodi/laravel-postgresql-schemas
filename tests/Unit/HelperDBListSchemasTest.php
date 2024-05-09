<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class HelperDBListSchemasTest extends TestCase
{
    public function test_it_lists_schemas()
    {
        $expectedSchemas = ['donkey', 'kong'];

        Config::set('postgres-schemas.schemas', $expectedSchemas);

        $schemas = db_list_schemas();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $schemas);

        $this->assertEquals($schemas->all(), $expectedSchemas);
    }
}
