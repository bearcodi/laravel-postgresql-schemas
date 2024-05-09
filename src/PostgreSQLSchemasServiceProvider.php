<?php

namespace Bearcodi\Laravel\PostgreSQLSchemas;

use Illuminate\Support\ServiceProvider;

class PostgreSQLSchemasServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/postgres-schemas.php', 'postgres-schemas'
        );

        $this->loadMigrationsFrom(
            __DIR__.'/../database/migrations'
        );
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/postgres-schemas.php' => config_path('postgres-schemas.php'),
        ]);
    }
}
