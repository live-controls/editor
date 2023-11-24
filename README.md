# editor
 editor.js implementation for live-controls

**Warning: This package is not usable at the moment!**

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
- Add to @vite(['resources/css/app.css', **'resources/js/lseditor.js', 'resources/css/lseditor.css'**, 'resources/js/app.js'])

# Usage
## Tools
### Custom Tools
To add custom tools simply follow those steps:
1) Call installation tool:
```ps
livecontrols-editor:install-tool;
```
2) Select "other" option
3) Add package name like in "npm i --save **@editorjs/image**"
4) Add unique tool name. This will be saved as a javascript variable as window.TOOL_NAME
5) Add a key for the tool at the end it will look like this:
```ps
KEY: TOOL_NAME
```
6) Add the tool like this:
```
@livewire('livecontrols-editor', ['tools' => ['KEY' => ['name' => 'TOOL_NAME]]])

```

### Custom Tools with additional configuration
To add custom tools with additional informations, follow this example with carousel-editorjs:
1) Call installation tool:
```ps
livecontrols-editor:install-tool;
```
2) Select "other" option
3) Add package name: carousel-editorjs
4) Add tool name: EditorJSCarousel
5) Add key for tool: carousel
6) Let system install the tool
7) Add the tool like this:
```blade
@livewire('livecontrols-editor', ['tools' => ['carousel' => ['name' => 'EditorJSCarousel', 'custom' => '{class: EditorJSCarousel,config:{ endpoints: {byFile: "URL_FETCH",}}}']]])
```
