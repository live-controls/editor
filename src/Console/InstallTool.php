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
            'alert',
            'header-with-alignment',
            'paragraph-with-alignment',
            'header-with-anchor',
            'toggle-block',
            'list',
            'nested-list',
            'checklist',
            'nested-checklist',
            'image',
            'simple-image',
            'link',
            'attaches',
            'embed',
            'inline-image',
            'carousel'
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

            case 'header-with-alignment':
                $this->installHeaderWithAlignment();
                break;
            case 'paragraph-with-alignment':
                $this->installParagraphWithAlignment();
                break;
            case 'header-with-anchor':
                $this->installHeaderWithAnchor();
                break;
            case 'toggle-block':
                $this->installToggleBlock();
                break;

                
            case 'list':
                $this->installList();
                break;
            case 'nested-list':
                $this->installNestedList();
                break;
            case 'checklist':
                $this->installChecklist();
                break;
            case 'nested-checklist':
                $this->installNestedChecklist();
                break;
            case 'image':
                $this->installImage();
                break;
            case 'simple-image':
                $this->installSimpleImage();
                break;
            case 'link':
                $this->installLink();
                break;
            case 'attaches':
                $this->installAttaches();
                break;
            case 'embed':
                $this->installEmbed();
                break;
            case 'inline-image':
                $this->installInlineImage();
                break;
            case 'carousel':
                $this->installCarousel();
                break;
            default:
                $this->warn('Invalid selection...');
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
            $fContent = "import EditorJSAlert from 'editorjs-alert';\nwindow.EditorJSAlert = EditorJSAlert;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'alert\'] to add Tool.');
    }

    private function installHeaderWithAlignment()
    {
        //Install NPM Package
        $this->info('Trying to install header with alignment package...');
        if(shell_exec('npm i --save editorjs-header-with-alignment') === null)
        {
            $this->warn("Couldn't install header with alignment package... Please manually install it!");
            return;
        }
        $this->info("Header with alignment package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "editorjs-header-with-alignment")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSHeaderWithAlignment from 'editorjs-header-with-alignment';\nwindow.EditorJSHeader = EditorJSHeaderWithAlignment;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'header-with-alignment\'] to add Tool.');
    }

    private function installParagraphWithAlignment()
    {
        //Install NPM Package
        $this->info('Trying to install paragraph with alignment package...');
        if(shell_exec('npm i --save editorjs-paragraph-with-alignment@3.x') === null)
        {
            $this->warn("Couldn't install paragraph with alignment package... Please manually install it!");
            return;
        }
        $this->info("Paragraph with alignment package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "editorjs-paragraph-with-alignment")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSParagraphWithAlignment from 'editorjs-paragraph-with-alignment';\nwindow.EditorJSParagraph = EditorJSParagraphWithAlignment;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'paragraph-with-alignment\'] to add Tool.');
    }

    private function installHeaderWithAnchor()
    {
        //Install NPM Package
        $this->info('Trying to install header with anchor package...');
        if(shell_exec('npm i --save editorjs-header-with-anchor') === null)
        {
            $this->warn("Couldn't install header with anchor package... Please manually install it!");
            return;
        }
        $this->info("Header with anchor package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "editorjs-header-with-anchor")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSHeaderWithAnchor from 'editorjs-header-with-anchor';\nwindow.EditorJSHeader = EditorJSHeaderWithAnchor;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'header-with-anchor\'] to add Tool.');
    }

    private function installToggleBlock()
    {
        //Install NPM Package
        $this->info('Trying to install toggle block package...');
        if(shell_exec('npm i --save editorjs-toggle-block') === null)
        {
            $this->warn("Couldn't install toggle block package... Please manually install it!");
            return;
        }
        $this->info("Toggle block package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "editorjs-toggle-block")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSToggleBlock from 'editorjs-toggle-block';\nwindow.EditorJSToggleBlock = EditorJSToggleBlock;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'toggle-block\'] to add Tool.');
    }

    private function installList()
    {
        //Install NPM Package
        $this->info('Trying to install list package...');
        if(shell_exec('npm i --save @editorjs/list') === null)
        {
            $this->warn("Couldn't install list package... Please manually install it!");
            return;
        }
        $this->info("List package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "@editorjs/list")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSList from '@editorjs/list';\nwindow.EditorJSList = EditorJSList;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'list\'] to add Tool.');
    }

    private function installNestedList()
    {
        //Install NPM Package
        $this->info('Trying to install nested list package...');
        if(shell_exec('npm i --save @editorjs/nested-list') === null)
        {
            $this->warn("Couldn't install nested list package... Please manually install it!");
            return;
        }
        $this->info("Nested List package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "@editorjs/nested-list")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSNestedList from '@editorjs/nested-list';\nwindow.EditorJSNestedList = EditorJSNestedList;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'nested-list\'] to add Tool.');
    }

    private function installChecklist()
    {
        //Install NPM Package
        $this->info('Trying to install checklist package...');
        if(shell_exec('npm i --save @editorjs/checklist') === null)
        {
            $this->warn("Couldn't install checklist package... Please manually install it!");
            return;
        }
        $this->info("checklist package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, "editorjs-alert")){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import EditorJSChecklist from '@editorjs/checklist';\nwindow.EditorJSChecklist = EditorJSChecklist;\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }
        
        $this->CopyAndBuild();
        $this->info('Done... Use \'tools\' => [\'checklist\'] to add Tool.');
    }

    private function installNestedChecklist()
    {
        $this->error('Tool not included in this version!');
    }

    private function installImage()
    {
        $this->error('Tool not included in this version!');
    }

    private function installSimpleImage()
    {
        $this->error('Tool not included in this version!');
    }

    private function installLink()
    {
        $this->error('Tool not included in this version!');
    }

    private function installAttaches()
    {
        $this->error('Tool not included in this version!');
    }

    private function installEmbed()
    {
        $this->error('Tool not included in this version!');
    }

    private function installInlineImage()
    {
        $this->error('Tool not included in this version!');
    }

    private function installCarousel()
    {
        $this->error('Tool not included in this version!');
    }
}