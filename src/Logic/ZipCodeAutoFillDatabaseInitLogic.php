<?php

namespace Seus31\ZipCodeAutoFill\Logic;

use Exception;
use Illuminate\Support\Facades\Log;
use Seus31\ZipCodeAutoFill\Models\ZipCodeAutoFillZipCode;

class ZipCodeAutoFillDatabaseInitLogic
{
    /**
     * データの取得
     *
     * @return void
     */
    public function execute(): void
    {
        try {
            $textContent = $this->getFileOpen($this->getFilePath());
            $this->recordLooping($textContent);
            $this->getFileClose($textContent);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * ファイルパス取得
     *
     * @return string
     */
    private function getFilePath(): string
    {
        return env('ZIP_CODE_TXT_FILE_PATH', __DIR__ . '/../data/zipcode.txt');
    }

    /**
     * ファイルオープン
     *
     * @param string $filePath
     * @return resource
     */
    private function getFileOpen(string $filePath)
    {
        return fopen($filePath, "r");
    }

    /**
     * レコードのループ処理
     *
     * @param resource $textContent
     * @return void
     */
    private function recordLooping($textContent): void
    {
        if ($textContent) {
            while ($line = fgets($textContent)) {
                $line = trim($line);
                $explodeLine = explode(',', $line);
                $this->insert($explodeLine);
            }
        }
    }

    /**
     * データの登録処理
     *
     * @param array $explodeLine
     * @return void
     */
    private function insert(array $explodeLine): void
    {
        ZipCodeAutoFillZipCode::create([
            'local_government_code' => $explodeLine[0],
            'zipcode' => $explodeLine[1],
            'prefecture' => $explodeLine[2],
            'city' => $explodeLine[3],
            'address' => $explodeLine[4] ?? '',
        ]);
    }

    /**
     * ファイルクローズ
     *
     * @param resource $filePointer
     * @return void
     */
    private function getFileClose($filePointer)
    {
        fclose($filePointer);
    }
}
