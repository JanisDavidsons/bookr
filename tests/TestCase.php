<?php

declare(strict_types=1);

namespace Tests;

use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    /**
     * See if the response has header.
     */
    public function seeHasHeader(string $header): TestCase
    {
        $this->assertTrue(
            $this->response->headers->has($header),
            "Response should have the header {$header} but does not.",
        );

        return $this;
    }

    /**
     * Asserts that the response header matches s given regular expression.
     */
    public function seeHeaderWithRegExp(string $header, string $regex): void
    {
        $this->seeHasHeader($header)
             ->assertMatchesRegularExpression($regex, $this->response->headers->get($header) ?? '');
    }
}
