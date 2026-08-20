<?php

namespace Seus31\ZipCodeAutoFill\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class ZipCodeAutoFillServiceProviderTest extends TestCase
{
    use RefreshDatabase;

    public function test_config_is_merged(): void
    {
        $this->assertIsArray(config('zip-code-auto-fill.directories'));
    }

    public function test_migration_is_loaded(): void
    {
        $this->assertTrue(Schema::hasTable('zip_code_auto_fill_zip_codes'));
    }
}
