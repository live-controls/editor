# editor
 editor.js implementation for live-controls

# Installation
1) Run composer:
```
composer require live-controls/editor;
```

2) Auto-Installer:
```
php artisan livecontrols-editor:install;
```

2.1) Add vite reference to layout:
- Open layout file (ex. layouts/app.blade.php)
- Add to @vite(['resources/css/app.css', **'resources/js/lseditor.js'**, 'resources/js/app.js'])

# Usage
## Tools
### Header
#### Installation
1) Run in console:
```
php artisan livecontrols-editor:install-tool
```
2) Select option header
3) Add to livewire call:
```blade
@livewire('livecontrols-editor', ['tools' => ['header']])
```