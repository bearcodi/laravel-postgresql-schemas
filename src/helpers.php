<?php

use Illuminate\Support\Collection;

if (! function_exists('db_supports_schemas')) {
    function db_supports_schemas(?string $driver = null): bool
    {
        $connection = config('database.connections')[$driver] ?? null;

        $supportedDrivers = config('postgres-schemas.supported', []);

        return config('schemas.force', false) || in_array($connection ? $connection['driver'] : config('database.default'), $supportedDrivers, true);
    }
}

if (! function_exists('db_list_schemas')) {
    function db_list_schemas(): Collection
    {
        $schemaPrefix = config('postgres-schemas.prefix', '');

        $schemas = config('postgres-schemas.schemas', []);

        return Collection::make($schemas)->map(fn ($schema) => implode('_', array_filter([$schemaPrefix, $schema])));
    }
}

if (! function_exists('db_restrict_or_cascade_schemas')) {
    function db_restrict_or_cascade_schemas(): string
    {
        return config('postgres-schemas.delete_schema_contents_on_drop', true) ? 'CASCADE' : 'RESTRICT';
    }
}
