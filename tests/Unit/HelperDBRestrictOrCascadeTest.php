<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class   HelperDBRestrictOrCascadeTest extends TestCase
{
    public function test_it_returns_cascade_when_schema_contents_on_drop_is_true()
    {

        Config::set('postgres-schemas.delete_schema_contents_on_drop', true);

        $this->assertEquals(db_restrict_or_cascade_schemas(), 'CASCADE');

    }

    public function test_it_returns_restrice_when_schema_contents_on_drop_is_false()
    {

        Config::set('postgres-schemas.delete_schema_contents_on_drop', false);
        $this->assertEquals(db_restrict_or_cascade_schemas(), 'RESTRICT');
    }
}
