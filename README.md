![GitHub](https://img.shields.io/github/license/nfaiz/ci4-debug-toolbar)
![GitHub repo size](https://img.shields.io/github/repo-size/nfaiz/ci4-debug-toolbar?label=size)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=nfaiz/ci4-debug-toolbar)

# ci4-debug-toolbar
SQL highlighter using Highlight.php for CodeIgniter 4 Database Debug Toolbar.


## Description
Make CodeIgniter 4 Database Debug Toolbar to be **more readable and themeable**


## Requirements
* Codeigniter 4.*
* Highlight.php ^9.18.*


## Installation

### 1. Using Composer or
Using composer command below will install this package and dependencies.

  > composer require nfaiz/ci4-debug-toolbar

### 2. Manual

#### i. Download and set autoload
Download this package/repo, extract and rename this folder to **ci4-debug-toolbar**.
Enable it by editing **app/Config/Autoload.php** and adding the **Nfaiz\DebugToolbar** namespace to the **$psr4** array. 
For example, if you copied it into **ThirdParty**:
```php
    $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
	    'Config'      => APPPATH . 'Config',
        'Nfaiz\DebugToolbar' => APPPATH . 'ThirdParty\ci4-debug-toolbar\src',
    ];
```

#### ii. Install Highlight.php
By using composer, use the following command:

  > composer require scrivo/highlight.php


## Setup
When the installation is completed, modify the following files in **app/Config** directory
* Events.php
* Toolbar.php

### Events.php
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


### Toolbar.php
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


## Documentation:

### Change the default display theme.
With the installation steps above, the package will work out of the box. 
To change the default display theme, Create **app\Config\DebugToolbar.php** config file

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
     * dbCss configurations (default and dark).
     * List of CSS files are available in VENDORPATH <vendorpath/scrivo/highlight.php/styles> directory.
     * 
     * 
     * @var array
     */
    public $dbCss = [
        'default' => 'default.css',
        'dark'    => 'dark.css'
    ];

    /**
     * -------------------------
     * dbCssFolder
     * -------------------------
     * 
     * This will point the folder style path to public folder.
     * Folder name WITHOUT trailing slash. i.e 'assets/styles'.
     * Leave it blank (empty string) to use public root folder.
     * 
     * 
     * Default value is false (using VENDORPATH).
     * 
     * @var string|bool
     */
    public $dbCssFolder = false;
}

```

#### $dbCss
* Modify `default` and `dark` key value accordingly.
* Css file is css `name` with css `extension` (.css)
* See **NOTES**.

#### $dbCssFolder
* Modify this value to string or boolean false.
* String format must be set WITHOUT trailing slash. To use public root folder, set to empty string.
* Set value to `false` to use default path.


### Notes
* All css theme files can be found at **vendor/scrivo/highlight.php/styles**.
* Themes demo: [https://highlightjs.org/static/demo/]
