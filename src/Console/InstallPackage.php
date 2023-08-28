<?php

namespace LiveControls\Editor\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPackage extends Command
{
    protected $signature = 'livecontrols-editor:install';

    protected $description = 'Install the Editor';

    public function handle()
    {
        $this->info("Installing dependencies...");
        if(shell_exec('composer install') === null)
        {
            $this->warn("Couldn't install dependencies... Please manually install them!");
            return;
        }
        $this->info("Dependencies installed...");
    }
}
