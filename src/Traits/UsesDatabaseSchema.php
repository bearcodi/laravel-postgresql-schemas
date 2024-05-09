<?php

namespace Bearcodi\Laravel\PostgreSQLSchemas\Traits;

trait UsesDatabaseSchema
{
    protected function getSchema(): ?string
    {
        return $this->schema ?? null;
    }

    public function getTable(): string
    {
        $table = parent::getTable();

        if (! $this->getSchema()) {
            return $table;
        }

        $schemaPrefix = config('postgres-schemas.prefix', '');

        $schemas = collect(config('postgres-schemas.schemas'));

        if (! $schemas->contains($this->schema)) {
            throw new \Exception("Schema $this->schema not present in available schemas list.");
        }

        $schemaSuffix = db_supports_schemas($this->getConnectionName()) ? '.' : '_';

        $schema = "{$schemaPrefix}_{$this->schema}{$schemaSuffix}";

        return $schema.str_replace($schema, '', $table);
    }
}
