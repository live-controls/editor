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
        copy(__DIR__.'/../../resources/js/lseditor.js', resource_path('js/lseditor.js'));
        $this->info("resources/js/lseditor.js created...");

        $this->info("Copying lseditor.css to resources/css folder...");
        copy(__DIR__.'/../../resources/css/lseditor.css', resource_path('css/lseditor.css'));
        $this->info("resources/css/lseditor.css created...");

        if($this->ask("Do you want to update your vite.config.js automatically? Back it up first! [y/n]", "n") === "y")
        {
            $this->info("Trying to include 'resources/js/lseditor.js' in vite.config.js");
            $fContent = file_get_contents(base_path('vite.config.js'));
            if(str_contains($fContent, "resources/js/lseditor.js")){
                $this->warn("Inclusion of 'resources/js/lseditor.js' already exists inside vite.config.js!");
            }else{
                $fContent = str_replace("input: [", "input: [\n'resources/js/lseditor.js',\n'resources/css/lseditor.css',\n", $fContent);
                file_put_contents(base_path('vite.config.js'), $fContent);
                $this->info("'resources/js/lseditor.js' and 'resources/css/lseditor.css' included in vite.config.js");
                $this->info("Building application... (Running npm run build)");
                if(shell_exec('npm run build') === null)
                {
                    $this->warn("Couldn't build application...");
                }else{
                    $this->info("Application built!");
                    $this->info("Add 'resources/js/lseditor.js' and 'resources/css/lseditor.css' to vite['resources/css/app.css'[...]] in layout");
                }
            }
        }else{
            $this->warn("Include 'resources/js/lseditor.js' and 'resources/css/lseditor.css' in vite.config.js and run 'npm run build'");
        }
    }
}