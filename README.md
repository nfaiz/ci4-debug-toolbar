![GitHub](https://img.shields.io/github/license/nfaiz/ci4-debug-toolbar)
![GitHub repo size](https://img.shields.io/github/repo-size/nfaiz/ci4-debug-toolbar?label=size)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=nfaiz/ci4-debug-toolbar)

# ci4-debug-toolbar
SQL highlighter using Highlight.php for CodeIgniter 4 Framework.\
**NOTE: This lib is a fun project.**

## Description
Extending default SQL style format for debug toolbar using Highlight.php [https://github.com/scrivo/highlight.php] to be
**more readable and themeable**


## Requirements
* Codeigniter 4.*
* Highlight.php ^9.18.*


## Installation

### Manual

#### 1. Download and set autoload
Download this repo, extract and rename this folder to **ci4-debug-toolbar**. 
Enable it by editing **app/Config/Autoload.php** and adding the **Nfaiz\DebugToolbar**
namespace to the **$psr4** array. For example, if you copied it into **ThirdParty**:
```php
    $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
		'Config'      => APPPATH . 'Config',
        'Nfaiz\DebugToolbar' => APPPATH . 'ThirdParty\ci4-debug-toolbar\src',
    ];
```

#### 2. Install Highlight.php
By using composer you may use the following command:

  > composer require scrivo/highlight.php


### Events
Find and edit/change **app/Config/Events.php**\
From
```php
Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
```
To
```php
// Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
Events::on('DBQuery', 'Nfaiz\DebugToolbar\Collectors\Database::collect');
```


### Toolbar
Find and edit/change **app/Config/Toolbar.php**\
From
```php
use CodeIgniter\Debug\Toolbar\Collectors\Database;
```
To
```php
// use CodeIgniter\Debug\Toolbar\Collectors\Database;
use Nfaiz\DebugToolbar\Collectors\Database;
```


## Documentation:

### Using CSS Highlighter

Create DebugToolbar config file **app\Config\DebugToolbar.php** 

```php
<?php

namespace Config;

class DebugToolbar extends \Nfaiz\DebugToolbar\Config\DebugToolbar
{
    /**
     * -------------------------
     * Theme configuration
     * -------------------------
     * 
     * Configuration for default and dark theme using Highlight.php
     * Css file can be found at <vendorpath/scrivo/highlight.php/styles> directory.
     * 
     * @var array
     */
    //public $dbTheme = [
    //    'default' => 'github.css',
    //    'dark'    => 'dracula.css'
    //];
}
```

**$dbTheme** array is commented by default. Default and dark key in **$dbTheme** array are for CI4's toolbar-theme.
If you want to change the db theme, uncomment **$dbTheme** array and change the value name accordingly.  

All css theme files can be found at **vendor/scrivo/highlight.php/styles**.

Themes demo: [https://highlightjs.org/static/demo/]


## Author's Profile:

Github: [https://github.com/nfaiz]
