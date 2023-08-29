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
- Add to @vite(['resources/css/app.css', **'resources/js/lseditor.js'**, 'resources/js/app.js'])

# Usage
## Tools
### Custom Tools
To add custom tools simply follow those steps:
1) Call installation tool:
```ps
livecontrols-editor:install-tool;
```
2) Select "other" option
3.1) Add package name like in "npm i --save **@editorjs/image**"
3.2) Add unique tool name. This will be saved as a javascript variable as window.TOOL_NAME
3.3) Add a key for the tool at the end it will look like this:
```ps
KEY: TOOL_NAME
```
Warning: Further options will be added later in development!