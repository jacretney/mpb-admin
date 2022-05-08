<?php

namespace Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Based on: https://gist.github.com/fourstacks/9cc6a68ed25fbbf00aa016da34f9a8be
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            $namespace = 'Database\\Factories\\';
            $modelName = Str::afterLast($modelName, '\\');
            return $namespace.$modelName.'Factory';
        });
    }
}
