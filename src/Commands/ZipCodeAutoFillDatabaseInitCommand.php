<?php

namespace Seus31\ZipCodeAutoFill\Commands;

use Illuminate\Console\Command;
use Seus31\ZipCodeAutoFill\Logic\ZipCodeAutoFillDatabaseInitLogic;

class ZipCodeAutoFillDatabaseInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zip-code-auto-fill:db:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '郵便番号データの作成';

    /**
     * @var ZipCodeAutoFillDatabaseInitLogic
     */
    private $zipCodeAutoFillDatabaseInitLogic;

    /**
     * Create a new command instance.
     *
     * @param ZipCodeAutoFillDatabaseInitLogic $zipCodeAutoFillDatabaseInitLogic
     */
    public function __construct(ZipCodeAutoFillDatabaseInitLogic $zipCodeAutoFillDatabaseInitLogic)
    {
        parent::__construct();

        $this->zipCodeAutoFillDatabaseInitLogic = $zipCodeAutoFillDatabaseInitLogic;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->zipCodeAutoFillDatabaseInitLogic->execute();

        return 1;
    }
}
