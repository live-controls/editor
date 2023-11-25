<?php

namespace LiveControls\Editor\Http\Livewire;

use Livewire\Component;

class Editor extends Component
{
    public $holderId = 'editorjs';
    public $tools;
    public $defaultBlock;

    public $oldData;
    
    public function hydrate()
    {
        if(is_null($this->tools)){
            $this->tools = config('livecontrols_editor.default_tools', null);
        }
    }

    public function render()
    {
        return view('livecontrols-editor::livewire.editor');
    }
}
