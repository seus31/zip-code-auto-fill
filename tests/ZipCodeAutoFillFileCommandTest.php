<?php

namespace Seus31\ZipCodeAutoFill\Tests;

use Illuminate\Support\Facades\File;

class ZipCodeAutoFillFileCommandTest extends TestCase
{
    protected function tearDown(): void
    {
        File::deleteDirectory(app_path('Livewire'));
        File::deleteDirectory(resource_path('views/livewire'));

        parent::tearDown();
    }

    public function test_it_generates_the_livewire_component_under_app_livewire(): void
    {
        $this->artisan('zip-code-auto-fill:file:create')->assertExitCode(0);

        $componentPath = app_path('Livewire/ZipCodeAutoFillForm.php');
        $viewPath = resource_path('views/livewire/zip-code-auto-fill-form.blade.php');

        $this->assertFileExists($componentPath);
        $this->assertFileExists($viewPath);
        $this->assertStringContainsString('namespace App\Livewire;', File::get($componentPath));
    }
}
