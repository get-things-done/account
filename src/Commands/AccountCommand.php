<?php

namespace GetThingsDone\Account\Commands;

use Illuminate\Console\Command;

class AccountCommand extends Command
{
    public $signature = 'account';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
