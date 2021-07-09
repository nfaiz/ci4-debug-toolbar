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

Please refer [here](MANUAL.md#installation) for manual installation.


## Setup
Using spark command below will setup all the files.

  > php spark debugtoolbar:database

Please refer [here](MANUAL.md#setup) for manual setup.

## Usage
Themes for default and dark are configurable using **app\Config\DebugToolbar.php**. 

**CodeIgniter 4** `Debug Toolbar Database` shipped with 2 styles
* default
* dark


### $dbCss
* Use css `extension` for css file name (i.e 'filename.css').
* Assign `default` and `dark` key value accordingly. See **NOTES**.

### $dbCssFolder
* Folder must be set WITHOUT trailing slash (i.e 'assets/styles'). 
* For public root folder, set the value to empty string (`''`).
* Set value to `false` to use default vendor path ('vendor/scrivo/highlight.php/styles')


## Notes
* All css styles for Highlight.php can be found at **vendor/scrivo/highlight.php/styles**.
* Themes demo: [https://highlightjs.org/static/demo/]
