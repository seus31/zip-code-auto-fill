<?php

namespace Seus31\ZipCodeAutoFill\Commands;

use Illuminate\Console\Command;
use Seus31\ZipCodeAutoFill\Logic\ZipCodeAutoFillFileCommandLogic;

class ZipCodeAutoFillFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zip-code-auto-fill:file:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '関連ファイル作成';

    /**
     * @var ZipCodeAutoFillFileCommandLogic
     */
    private $zipCodeAutoFillFileCommandLogic;

    /**
     * Create a new command instance.
     *
     * @param ZipCodeAutoFillFileCommandLogic $zipCodeAutoFillFileCommandLogic
     */
    public function __construct(ZipCodeAutoFillFileCommandLogic $zipCodeAutoFillFileCommandLogic)
    {
        parent::__construct();

        $this->zipCodeAutoFillFileCommandLogic = $zipCodeAutoFillFileCommandLogic;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->zipCodeAutoFillFileCommandLogic->checkDirectories();
        $this->zipCodeAutoFillFileCommandLogic->makeFiles();

        return 0;
    }
}
