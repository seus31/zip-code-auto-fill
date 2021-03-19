<?php
/**
 *  Copyright (c) 2021 seus31
 *  Released under the MIT license
 *  https://github.com/seus31/zip-code-auto-fill/blob/master/license.txt
 */

namespace Seus31\ZipCodeAutoFill\Logic;

use Illuminate\Support\Facades\Log;

class ZipCodeAutoFillFileCommandLogic
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 各ディレクトリのチェック
     */
    public function checkDirectories() {
        foreach (config('zip-code-auto-fill.directories') as $directory) {
            $this->ifDirectoryIsNotExists(base_path($directory));
        }
    }

    /**
     * ディレクトリの存在確認をし、存在しなければ作成
     * @param $directoryPath
     */
    private function ifDirectoryIsNotExists($directoryPath) {
        if(!file_exists($directoryPath)) {
            mkdir($directoryPath, 0755, true);
        }
    }

    /**
     * migrationsファイルの作成
     *
     * @return void
     */
    public function makeFiles() {
        foreach (config('zip-code-auto-fill.copies') as $file => $newFile) {
            if (!copy($file, $newFile)) {
                Log::warning("failed to copy $file...");
            }
        }
    }
}
