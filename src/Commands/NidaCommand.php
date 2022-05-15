<?php

namespace Alphaolomi\Nida\Commands;

use Illuminate\Console\Command;

class NidaCommand extends Command
{
    public $signature = 'laravel-nida';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
