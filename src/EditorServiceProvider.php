<?php

namespace LiveControls\Editor;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;

class EditorServiceProvider extends ServiceProvider
{
  public function register()
  { 
      $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'livecontrols_editor');
  }

  public function boot()
  {
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'livecontrols-editor');

      Livewire::component('livecontrols-editor', Editor::class);

      
      $this->publishes([
        __DIR__.'/../config/config.php' => config_path('livecontrols_editor.php'),
      ], 'livecontrols.editor.config');
  }
}
