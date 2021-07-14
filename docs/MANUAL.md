# Manual Installation And Setup

## Installation

### 1. Download and set autoload
Download this library, extract and rename this folder to **ci4-debug-toolbar**.
Enable it by editing **app/Config/Autoload.php** and adding the **Nfaiz\DebugToolbar** namespace to the **$psr4** array. 
E.g If this library copied into **ThirdParty**:
```php
    $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
	    'Config'      => APPPATH . 'Config',
        'Nfaiz\DebugToolbar' => APPPATH . 'ThirdParty\ci4-debug-toolbar\src',
    ];
```

### 2. Install Highlight.php
Install package via composer:

    composer require scrivo/highlight.php:^v9.18.*


## Setup

In **app/Config** directory<br />

Modify these php files.
* [Events](MANUAL.md#events)
* [Toolbar](MANUAL.md#toolbar)


### Events

#### Change database collector namespace
Modify **app/Config/Events.php**<br />
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
Modify **app/Config/Toolbar.php**<br />

#### 1. Change database collector namespace
From
```php
use CodeIgniter\Debug\Toolbar\Collectors\Database;
```
To
```php
// use CodeIgniter\Debug\Toolbar\Collectors\Database;
use Nfaiz\DebugToolbar\Collectors\Database;
```

#### 2. Add $sqlCssTheme property
```php
    public $maxQueries = 100;

    /**
     * -------------------------------------------------------------
     * SQL CSS Theme
     * -------------------------------------------------------------
     * 
     * Configurations for light and dark mode.
     * Set CSS theme name WITHOUT css extension. E.g 'github'.
     * 
     * To get available CSS themes in controller use
     *     service('highlighter')->getAvailableStyleSheets(); 
     * or to get available CSS theme with absolute path use
     *     service('highlighter')->getAvailableStyleSheets(true);
     * 
     * @var array
     */
    public $sqlCssTheme = [
        'light' => 'default',
        'dark'  => 'dark'
    ];
```
