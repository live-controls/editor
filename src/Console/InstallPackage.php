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
        $this->info("Installing editorjs/editorjs...");
        if(shell_exec('npm i @editorjs/editorjs --save') === null)
        {
            $this->warn("Couldn't install dependencies... Please manually install them!");
            return;
        }
        $this->info("editorjs/editorjs installed...");

        $this->info("Copying lseditor.js to resources/js folder...");
        copy('../../resources/js/lseditor.js', resource_path('js/lseditor.js'));
        $this->info("resources/js/lseditor.js created...");
        $this->warn("Include 'resources/js/app.js' in vite.config.js");
    }
}
