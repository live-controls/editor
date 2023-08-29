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
            'other',
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
            case 'other':
                $packageName = $this->ask('What is the package name?');
                $toolName = $this->ask('What is the tool name?');
                $key = $this->ask('What is the key?');
                $this->installTool($packageName, $toolName, $key);
                break;
            case 'paragraph':
                $this->installTool("@editorjs/paragraph", "EditorJSParagraph", "paragraph");
                break;
            case 'header':
                $this->installTool("@editorjs/header", "EditorJSHeader", "header");
                break;
            case 'quote':
                $this->installTool("@editorjs/quote", "EditorJSQuote", "quote");
                break;
            case 'warning':
                $this->installTool("@editorjs/warning", "EditorJSWarning", "warning");
                break;
            case 'delimiter':
                $this->installTool("@editorjs/delimiter", "EditorJSDelimiter", "delimiter");
                break;
            case 'alert':
                $this->installTool("editorjs-alert", "EditorJSAlert", "alert");
                break;

            case 'header-with-alignment':
                $this->installTool("editorjs-header-with-alignment", "EditorJSHeaderWithAlignment", "header");
                break;
            case 'paragraph-with-alignment':
                $this->installTool("editorjs-paragraph-with-alignment@3.x", "EditorJSParagraphWithAlignment", "paragraph");
                break;
            case 'header-with-anchor':
                $this->installTool("editorjs-header-with-anchor", "EditorJSHeaderWithAnchor", "header");
                break;
            case 'toggle-block':
                $this->installTool("editorjs-toggle-block", "EditorJSToggleBlock", "toggle-block");
                break;  
            case 'list':
                $this->installTool("@editorjs/list", "EditorJSList", "list");
                break;
            case 'nested-list':
                $this->installTool("@editorjs/nested-list", "EditorJSNestedList", "list");
                break;
            case 'checklist':
                $this->installTool("@editorjs/checklist", "EditorJSChecklist", "checklist");
                break;

            case 'nested-checklist':
                $this->installTool("@calumk/editorjs-nested-checklist", "EditorJSNestedChecklist", "nestedchecklist");
                break;
            case 'image':
                $this->installImage();
                break;
            case 'simple-image':
                $this->installTool("@editorjs/simple-image", "EditorJSSimpleImage", "image");
                break;
            case 'link':
                $this->installTool("@editorjs/link", "EditorJSLinkTool", "linkTool");
                break;
            case 'attaches':
                $this->installAttaches();
                break;
            case 'embed':
                $this->installTool("@editorjs/embed", "EditorJSEmbed", "embed");
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

    /**
     * Installs the tool
     *
     * @param string $packageName The name of the package as from 'npm $packageName'
     * @param string $toolName The name of the tool as from 'import $toolName from $packageName'
     * @param string $key The key of the tool used in the livewire component
     * @return void
     */
    private function installTool(string $packageName, string $toolName, string $key)
    {
        //Install NPM Package
        $this->info('Trying to install paragraph package...');
        if(shell_exec('npm i '.$packageName.' --save') === null)
        {
            $this->warn("Couldn't install paragraph package... Please manually install it!");
            return;
        }
        $this->info("Paragraph package installed!");

        //Include module in lseditor.js file 
        $this->info("Trying to add package to lseditor.js");
        $fContent = file_get_contents(__DIR__.'/../../resources/js/lseditor.js');
        if(str_contains($fContent, $packageName)){
            $this->warn('Package already imported in lseditor.js file!');
        }else{
            $fContent = "import ".$toolName." from '".$packageName."';\nwindow.".$toolName." = ".$toolName.";\n".$fContent;
            file_put_contents(__DIR__.'/../../resources/js/lseditor.js', $fContent);
            $this->info("Package added to lseditor.js!");
        }


        $this->CopyAndBuild();

        $this->info('Done... Use \'tools\' => [\''.$key.'\' => \''.$toolName.'\'] to add Tool.');
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

    private function installImage()
    {
        $this->error('Tool not included in this version!');
    }

    private function installAttaches()
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