<?php

namespace Tomsgad\Beem\Commands;

use Illuminate\Console\Command;

class BeemCommand extends Command
{
    public $signature = 'laravel-beem';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
