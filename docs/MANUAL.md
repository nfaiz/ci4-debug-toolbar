# Manual

## Installation

* [Download and set autoload](MANUAL.md#1-Download-and-set-autoload)
* [Install Highlight.php](MANUAL.md#2-Install-Highlightphp)

### 1. Download and set autoload
Download this library, extract and rename this folder to **ci4-debug-toolbar**.
Enable it by editing **app/Config/Autoload.php** and adding the **Nfaiz\DebugToolbar** namespace to the **$psr4** array.<br />
See [namespace](https://www.codeigniter.com/user_guide/general/modules.html#namespaces) for more information.

E.g Using **app/ThirdParty** directory path:
```php
    $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
        'Config'      => APPPATH . 'Config',
        'Nfaiz\DebugToolbar' => APPPATH . 'ThirdParty\ci4-debug-toolbar\src',
    ];
```

### 2. Install Highlight.php
Install package via composer:

    composer require scrivo/highlight.php:^v9.18


## Setup

In **app/Config** directory<br />

Modify these php files.
* [Events](MANUAL.md#1-events)
* [Toolbar](MANUAL.md#2-toolbar)


### 1. Events
`app/Config/Events.php`<br />

#### Change database collector namespace
From
```php
Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
```
To
```php
// Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
Events::on('DBQuery', 'Nfaiz\DebugToolbar\Collectors\Database::collect');
```

### 2. Toolbar
`app/Config/Toolbar.php`<br />

#### i. Change database collector namespace
From
```php
use CodeIgniter\Debug\Toolbar\Collectors\Database;
```
To
```php
// use CodeIgniter\Debug\Toolbar\Collectors\Database;
use Nfaiz\DebugToolbar\Collectors\Database;
```

#### ii. Add $sqlCssTheme property
```php
    public $maxQueries = 100;

    /**
     * -------------------------------------------------------------
     * SQL CSS Theme
     * -------------------------------------------------------------
     * 
     * Configuration for light and dark mode SQL syntax highlighter.
     * 
     * @var array
     */
    public $sqlCssTheme = [
        'light' => 'default',
        'dark'  => 'dark'
    ];
```
