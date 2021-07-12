# Manual Installation

## Installation

#### Download and set autoload
Download this library/repo, extract and rename this folder to **ci4-debug-toolbar**.
Enable it by editing **app/Config/Autoload.php** and adding the **Nfaiz\DebugToolbar** namespace to the **$psr4** array. 
For example, if you copied it into **ThirdParty**:
```php
    $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
	'Config'      => APPPATH . 'Config',
        'Nfaiz\DebugToolbar' => APPPATH . 'ThirdParty\ci4-debug-toolbar\src',
    ];
```

#### Install Highlight.php
By using composer, use the following command:

  > composer require scrivo/highlight.php


## Setup

In **app/Config** directory

Modify these php files
* [Events](MANUAL.md#events)
* [Toolbar](MANUAL.md#toolbar)

Create this php file (optional)
* [DebugToolbar](MANUAL.md#debugtoolbar)

#### Events
Modify **app/Config/Events.php**\
From
```php
Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
```
To
```php
// Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
Events::on('DBQuery', 'Nfaiz\DebugToolbar\Collectors\Database::collect');
```

#### Toolbar
Modify **app/Config/Toolbar.php**\
From
```php
use CodeIgniter\Debug\Toolbar\Collectors\Database;
```
To
```php
// use CodeIgniter\Debug\Toolbar\Collectors\Database;
use Nfaiz\DebugToolbar\Collectors\Database;
```

#### DebugToolbar
Create **app\Config\DebugToolbar.php** config file below to change default display theme

```php
<?php

namespace Config;

class DebugToolbar extends \Nfaiz\DebugToolbar\Config\DebugToolbar
{
    /**
     * -------------------------
     * dbCss
     * -------------------------
     * 
     * CSS styling file
     * 
     * dbCss configurations (default and dark).
     * List of CSS files are available in 'vendor/scrivo/highlight.php/styles'.
     * 
     * Set file name WITH css extension. (i.e 'github.css')
     * 
     * @var array
     */
    public $dbCss = [
        'default' => 'default.css',
        'dark'    => 'dark.css'
    ];

    /**
     * -------------------------
     * dbCssPath
     * -------------------------
     * 
     * Folder Path
     * 
     * Default value is false (using 'vendor/scrivo/highlight.php/styles').
     * 
     * Set value to string to use 'ROOTPATH/public/' as path.
     * String value must be set WITHOUT trailing slash (i.e 'assets/styles' or '').
     * Change $dbCss accordingly.
     * 
     * @var bool|string
     */
    public $dbCssPath = false;
}

```
