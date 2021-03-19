<?php
/**
 *  Copyright (c) 2021 seus31
 *  Released under the MIT license
 *  https://github.com/seus31/zip-code-auto-fill/blob/master/license.txt
 */

namespace Seus31\ZipCodeAutoFill\Providers;

use Illuminate\Support\ServiceProvider;
use Seus31\ZipCodeAutoFill\Commands\ZipCodeAutoFillDatabaseInitCommand;
use Seus31\ZipCodeAutoFill\Commands\ZipCodeAutoFillFileCommand;


class ZipCodeAutoFillServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }
        $this->registerMigrations();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();
    }

    /**
     * コンフィグファイルをマージ
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/zip-code-auto-fill.php', 'zip-code-auto-fill'
        );
    }

    /**
     * コマンドの登録
     */
    protected function registerCommands()
    {
        $this->commands([
            ZipCodeAutoFillDatabaseInitCommand::class,
            ZipCodeAutoFillFileCommand::class
        ]);
    }

    /**
     * マイグレーションファイルの登録
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');
    }
}
