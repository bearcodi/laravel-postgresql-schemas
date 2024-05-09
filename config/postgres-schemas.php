<?php

return [
    /**
     * Prefix for your environments schemas.
     */
    'prefix' => env('APP_ENV', ''),

    /**
     * Enable auto prefixing for your environment.
     */
    'autoprefix' => true,

    /**
     * Schemas list to create as part of migrations.
     */
    'schemas' => [
        'content',
    ],

    /**
     * Force remove schema contents on drop.
     *
     * @see Postgres manual reference. 'CASCADE' : 'RESTRICT'
     */
    'delete_schema_contents_on_drop' => true,

    /**
     * Force use Schemas irespective of datbase driver.
     *
     * For drivers that don't support schemas a schema will be implemented
     * using an `_` instead of the `.`, for example dev_content.table would
     * become dev_content_table instead.
     */
    'force' => false,
];
