![GitHub](https://img.shields.io/github/license/nfaiz/ci4-debug-toolbar)
![GitHub repo size](https://img.shields.io/github/repo-size/nfaiz/ci4-debug-toolbar?label=size)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=nfaiz/ci4-debug-toolbar)

# ci4-debug-toolbar
SQL highlighter using Highlight.php for CodeIgniter 4 Database Debug Toolbar.


## Description
Make CodeIgniter 4 Database Debug Toolbar to be **more readable and themeable**


## Requirements
* Codeigniter 4.* [https://github.com/codeigniter4/CodeIgniter4]
* Highlight.php ^9.* [https://github.com/scrivo/highlight.php]


## Installation
Using composer command below will install this library and dependencies.

  > composer require nfaiz/ci4-debug-toolbar

For manual installation, refer [here](MANUAL.md#installation).


## Setup
Using spark command below will setup all the files.

  > php spark debugtoolbar:database

For manual setup, refer [here](MANUAL.md#setup).

## Usage
To configure css file and folder path, edit **app\Config\DebugToolbar.php**.

### CSS File
$dbCss
```php
    public $dbCss = [
        'default' => 'github.css',
        'dark'    => 'dracula.css'
    ];
```
* Use css `extension` for css file name. i.e `'github.css'`.
* Assign `default` and `dark` key value accordingly. See **NOTES**.

### Folder Path
$dbCssFolder
```php
    public $dbCssFolder = 'assets/styles';
```
* Set value to `false` to use default vendor path. `'vendor/scrivo/highlight.php/styles'`
* Set folder **WITHOUT** trailing slash. i.e `'assets/styles'`. 
* To use public root folder, set value to empty string. `''`.


## Notes
* All css styles for Highlight.php can be found at **vendor/scrivo/highlight.php/styles**.
* Themes demo: [https://highlightjs.org/static/demo/]
