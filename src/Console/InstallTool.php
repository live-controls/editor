<?php

namespace LiveControls\Editor\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallTool extends Command
{
    protected $signature = 'livecontrols-editor:install-tool';

    protected $description = 'Install a tool for the Editor';

    public function handle()
    {
        $userChoice = $this->choice('Which tool do you want to install?', [
            'paragraph',
            'header',
            'quote',
            'warning',
            'delimiter',
            'alert'
        ]);

        switch ($userChoice) {
            case 'paragraph':
                $this->installParagraph();
                break;
            case 'header':
                $this->installHeader();
                break;
            case 'quote':
                $this->installQuote();
                break;
            case 'warning':
                $this->installWarning();
                break;
            case 'delimiter':
                $this->installDelimiter();
                break;
            case 'alert':
                $this->installAlert();
                break;
            default:
                # code...
                break;
        }

    }

    private function CopyAndBuild()
    {
        //Update local lseditor.js file in resources/js/lseditor.js
        $this->info("Copying lseditor.js to resources/js folder...");
        copy(__DIR__.'/../../resources/js/lseditor.js', resource_path('js/lseditor.js'));
        $this->info("resources/js/lseditor.js updated...");

        //Build application
        $this->info("Building application... (Running npm run build)");
        if(shell_exec('npm run build') === null)
        {
            $this->warn("Couldn't build application...");
        }else{
            $this->info("Application built!");
        }
    }

    private function installParagraph()
    {
        //Install NPM Package
        $this->info('Trying to install paragraph package...');
        if(shell_exec('npm i @editorjs/paragraph --save') === null)
        {
            $this->warn("Couldn't install paragraph package... Please manually install it!");
            return;
        }
        $this->info("Paragraph package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "@editorjs/paragraph")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSParagraph from '@editorjs/paragraph';\nwindow.EditorJSParagraph = EditorJSParagraph;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        

        $this->CopyAndBuild();

        $this->info('Done... Use \'tools\' => [\'paragraph\'] to add Tool.');
    }

    private function installHeader()
    {
        //Install NPM Package
        $this->info('Trying to install header package...');
        if(shell_exec('npm i @editorjs/header --save') === null)
        {
            $this->warn("Couldn't install header package... Please manually install it!");
            return;
        }
        $this->info("Header package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "@editorjs/header")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSHeader from '@editorjs/header';\nwindow.EditorJSHeader = EditorJSHeader;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        

        $this->CopyAndBuild();

        $this->info('Done... Use \'tools\' => [\'header\'] to add Tool.');
    }

    private function installQuote()
    {
        //Install NPM Package
        $this->info('Trying to install quote package...');
        if(shell_exec('npm i @editorjs/quote --save') === null)
        {
            $this->warn("Couldn't install quote package... Please manually install it!");
            return;
        }
        $this->info("Quote package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "@editorjs/quote")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSQuote from '@editorjs/quote';\nwindow.EditorJSQuote = EditorJSQuote;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        

        $this->CopyAndBuild();

        $this->info('Done... Use \'tools\' => [\'quote\'] to add Tool.');
    }

    private function installWarning()
    {
        //Install NPM Package
        $this->info('Trying to install warning package...');
        if(shell_exec('npm i @editorjs/warning --save') === null)
        {
            $this->warn("Couldn't install warning package... Please manually install it!");
            return;
        }
        $this->info("Warning package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "@editorjs/warning")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSWarning from '@editorjs/warning';\nwindow.EditorJSWarning = EditorJSWarning;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        

        $this->CopyAndBuild();

        $this->info('Done... Use \'tools\' => [\'warning\'] to add Tool.');
    }

    private function installDelimiter()
    {
        //Install NPM Package
        $this->info('Trying to install delimiter package...');
        if(shell_exec('npm i @editorjs/delimiter --save') === null)
        {
            $this->warn("Couldn't install delimiter package... Please manually install it!");
            return;
        }
        $this->info("Delimiter package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "@editorjs/delimiter")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSDelimiter from '@editorjs/delimiter';\nwindow.EditorJSDelimiter = EditorJSDelimiter;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        

        $this->CopyAndBuild();

        $this->info('Done... Use \'tools\' => [\'delimiter\'] to add Tool.');
    }

    private function installAlert()
    {
        //Install NPM Package
        $this->info('Trying to install alert package...');
        if(shell_exec('npm i editorjs-alert --save') === null)
        {
            $this->warn("Couldn't install alert package... Please manually install it!");
            return;
        }
        $this->info("Alert package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "editorjs-alert")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSAlert from '@editorjs-alert';\nwindow.EditorJSAlert = EditorJSAlert;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        

        $this->CopyAndBuild();

        $this->info('Done... Use \'tools\' => [\'alert\'] to add Tool.');
    }
}