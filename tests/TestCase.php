<?php

namespace Seus31\ZipCodeAutoFill\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Seus31\ZipCodeAutoFill\Providers\ZipCodeAutoFillServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ZipCodeAutoFillServiceProvider::class,
        ];
    }
}
