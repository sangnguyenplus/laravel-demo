<?php

namespace Org\Core\Commands;

use Core;
use Illuminate\Console\Command;

class DemoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just a command for demo purposes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(Core::inspire());

        return 0;
    }
}
