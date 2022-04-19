<?php

namespace Tests;

use App\Exceptions\DisabledHandler;

abstract class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use CreatesApplication;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    protected function setUp()
    {
        parent::setUp();
        \Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(\Illuminate\Contracts\Debug\ExceptionHandler::class, new DisabledHandler());
    }
}
