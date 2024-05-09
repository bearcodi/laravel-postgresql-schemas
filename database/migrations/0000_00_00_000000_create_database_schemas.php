<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        if (db_supports_schemas()) {

            db_list_schemas()->each(
                fn ($schema) => DB::statement("CREATE SCHEMA IF NOT EXISTS $schema")
            );
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (db_supports_schemas()) {
            $restrictOrCascade = db_restrict_or_cascade_schemas();
            db_list_schemas()->each(
                fn ($schema) => DB::statement("DROP SCHEMA IF EXISTS $schema $restrictOrCascade")
            );
        }
    }
};
