<?php

namespace Medicivn\EloquentLogger\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Define database migrations.
     *
     * @return void
     */
    public function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__. '/Database/migrations');
    }
}
