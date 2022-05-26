<?php

namespace Alphaolomi\Nida\Commands;

use Alphaolomi\Nida\Nida;
use Illuminate\Console\Command;

class NidaCommand extends Command
{
    protected $signature = 'nida:get {NIN : The ID of the user}';

    public $description = 'Get user infomation from NIDA';

    /**
     * @param Nida $nida
     * @return int
     */
    public function handle(Nida $nida): int
    {
        $nin = $this->argument('NIN');
        $data = $nida->getUserData($nin);
        $this->info(json_encode($data, JSON_PRETTY_PRINT));
        return self::SUCCESS;
    }
}
