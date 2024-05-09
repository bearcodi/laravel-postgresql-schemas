<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class HelperDBSupportsSchemasTest extends TestCase
{
    public function test_it_supports_the_default_database_driver_if_pgsql()
    {
        Config::set('database.default', 'pgsql');
        Config::set('postgres-schemas.support', ['pgsql']);

        $this->assertTrue(db_supports_schemas());
    }

    public function test_it_does_not_supports_driver_absent_from_supported_list()
    {
        Config::set('database.default', 'sqlite');
        Config::set('postgres-schemas.support', ['pgsql']);

        $this->assertFalse(db_supports_schemas());
    }

    public function test_it_accepts_a_driver_type_to_assess_support()
    {
        Config::set('database.default', 'sqlite');
        Config::set('postgres-schemas.support', ['pgsql']);

        $this->assertTrue(db_supports_schemas('pgsql'));
    }
}
