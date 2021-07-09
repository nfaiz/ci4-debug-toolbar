![GitHub](https://img.shields.io/github/license/nfaiz/ci4-debug-toolbar)
![GitHub repo size](https://img.shields.io/github/repo-size/nfaiz/ci4-debug-toolbar?label=size)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=nfaiz/ci4-debug-toolbar)

# ci4-debug-toolbar
Better SQL syntax highlighter for CodeIgniter 4 Database Debug Toolbar.


## Description
Make CodeIgniter 4 Database Debug Toolbar to be **more readable and themeable**.


## Requirements
* Codeigniter 4 [https://github.com/codeigniter4/CodeIgniter4]
* Highlight.php [https://github.com/scrivo/highlight.php]


## Installation
Install the package via composer:

  > composer require nfaiz/ci4-debug-toolbar

Refer [here](docs/MANUAL.md#installation) for manual/alternative installation method.


## Setup
Setup the library via spark:

  > php spark debugtoolbar:database

Refer [here](docs/MANUAL.md#setup) for manual/alternative setup method.


## Usage
Edit **app\Config\DebugToolbar.php** to configure css file and folder path.

### CSS File
$dbCss
```php
    public $dbCss = [
        'default' => 'github.css',
        'dark'    => 'dracula.css'
    ];
```
* Use css `extension` for css file name. i.e `'github.css'`.
* Assign `default` and `dark` key mode value accordingly. See **Notes**.

### Folder Path
$dbCssFolder
```php
    public $dbCssFolder = false;
```
* Set value to `false` to use default vendor path. `'vendor/scrivo/highlight.php/styles'`
* Set folder **WITHOUT** trailing slash. i.e `'assets/styles'`
* To use public root folder, set value to empty string. `''`


## Notes
* All css styles for Highlight.php can be found at **vendor/scrivo/highlight.php/styles**.
* Themes demo: [https://highlightjs.org/static/demo/]
