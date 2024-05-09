<?php

return [
    /**
     * Prefix for your environments schemas.
     */
    'prefix' => env('DB_SCHEMA_PREFIX', ''),

    /**
     * Schemas list to create as part of migrations.
     */
    'schemas' => [
        'content',
    ],

    'supported' => [
        'pgsql',
    ],
    /**
     * Force remove schema contents on drop.
     *
     * @see Postgres manual reference. 'CASCADE' : 'RESTRICT'
     */
    'delete_schema_contents_on_drop' => env('DB_SCHEMA_FORCEDROP', true),

    /**
     * Force use Schemas irespective of datbase driver.
     *
     * For drivers that don't support schemas a schema will be implemented
     * using an `_` instead of the `.`, for example dev_content.table would
     * become dev_content_table instead.
     */
    'force' => false,
];
