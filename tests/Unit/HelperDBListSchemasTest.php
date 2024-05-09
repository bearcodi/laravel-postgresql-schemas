<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class HelperDBListSchemasTest extends TestCase
{
    public function test_it_lists_schemas_without_prefix()
    {
        $expectedSchemas = ['donkey', 'kong'];

        Config::set('postgres-schemas.prefix', '');
        Config::set('postgres-schemas.schemas', $expectedSchemas);

        $schemas = db_list_schemas();

        $this->assertInstanceOf(Collection::class, $schemas);

        $this->assertEquals($schemas->all(), $expectedSchemas);
    }

    public function test_it_list_schemas_with_prefix()
    {
        $prefix = 'test';
        $expectedSchemas = ['test_donkey', 'test_kong'];

        Config::set('postgres-schemas.prefix', $prefix);
        Config::set('postgres-schemas.schemas', Collection::make($expectedSchemas)->map(fn($schema) => str_replace("{$prefix}_", "", $schema)));

        $schemas = db_list_schemas();

        $this->assertInstanceOf(Collection::class, $schemas);

        $this->assertEquals($schemas->all(), $expectedSchemas);
    }

}
