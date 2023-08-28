<?php

namespace LiveControls\Editor\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UninstallPackage extends Command
{
    protected $signature = 'livecontrols-editor:uninstall';

    protected $description = 'Uninstall the Editor';

    public function handle()
    {
        $this->info("Remove editorjs/editorjs...");
        if(shell_exec('npm uninstall @editorjs/editorjs') === null)
        {
            $this->warn("Couldn't uninstall dependencies... Please manually uninstall them!");
            return;
        }
        $this->info("editorjs/editorjs removed...");

        $this->info("Remove lseditor.js from resources/js folder...");
        unlink(resource_path('js/lseditor.js'));
        $this->info("resources/js/lseditor.js removed...");

        if($this->ask("Do you want to update your vite.config.js automatically? Back it up first! [y/n]", "n") === "y")
        {
            $this->info("Trying to remove 'resources/js/lseditor.js' in vite.config.js");
            $fContent = file_get_contents(base_path('vite.config.js'));
            if(!str_contains($fContent, "resources/js/lseditor.js")){
                $this->warn("Couldn't find resources/js/lseditor.js link!");
            }else{
                $fContent = str_replace("'resources/js/lseditor.js',", "", $fContent);
                file_put_contents(base_path('vite.config.js'), $fContent);
                $this->info("'resources/js/lseditor.js' removed from vite.config.js");
                $this->info("Building application... (Running npm run build)");
                if(shell_exec('npm run build') === null)
                {
                    $this->warn("Couldn't build application...");
                }else{
                    $this->info("Application built!");
                }
            }
        }else{
            $this->warn("Remove 'resources/js/lseditor.js' from vite.config.js and run 'npm run build'");
        }
    }
}