![GitHub](https://img.shields.io/github/license/nfaiz/ci4-debug-toolbar)
![GitHub repo size](https://img.shields.io/github/repo-size/nfaiz/ci4-debug-toolbar?label=size)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=nfaiz/ci4-debug-toolbar)

# ci4-debug-toolbar
SQL syntax highlighter for CodeIgniter 4 Database Debug Toolbar.


## Description
Make CodeIgniter 4 Database Debug Toolbar to be **more readable and themeable**.


### Default CodeIgniter 4 Database Debug Toolbar

* Default mode<br />
<img src="https://user-images.githubusercontent.com/1330109/125154813-894c0b80-e18e-11eb-8bf3-4e6834437ad9.png" alt="Default mode">

* Dark mode<br />
<img src="https://user-images.githubusercontent.com/1330109/125154888-ef389300-e18e-11eb-88f6-7f066ec09775.png" alt="Dark mode">

### Database Debug Toolbar after using this library

* Default mode (using default.css)<br />
<img src="https://user-images.githubusercontent.com/1330109/125154946-450d3b00-e18f-11eb-982f-93fcc3d09e06.png" alt="Default mode">

* Dark mode (using dark.css)<br />
<img src="https://user-images.githubusercontent.com/1330109/125155349-bf3ebf00-e191-11eb-922f-8b9bd9f12df8.png" alt="Dark mode">

### Another examples

* Default mode (using atom-one-light.css)
<img src="https://user-images.githubusercontent.com/1330109/125155187-bb5e6d00-e190-11eb-91a5-b4c2f7da46e4.png" alt="Default mode">

* Dark mode (using atom-one-dark.css)
<img src="https://user-images.githubusercontent.com/1330109/125155379-fca34c80-e191-11eb-981f-8fb6e8df9794.png" alt="Dark mode">


## Requirements
* Codeigniter 4 [https://github.com/codeigniter4/CodeIgniter4]
* Highlight.php [https://github.com/scrivo/highlight.php]


## Installation
Install the package via composer:

  > composer require nfaiz/ci4-debug-toolbar

Or refer [here](docs/MANUAL.md#installation) for manual installation.


## Setup
Setup the library via spark:

  > php spark debugtoolbar:database

This command will create **app\Config\DebugToolbar.php** config file and;<br /> 
will try to overwrite content in **app\Config\Events.php** and **app\Config\Toolbar.php**.<br /> 
Choose overwrite `y` when prompted.

Or refer [here](docs/MANUAL.md#setup) for manual setup.


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
* Use css `extension` for css file name. i.e `'github.css'`
* See **Notes**.

### Folder Path
$dbCssPath
```php
    public $dbCssPath = false;
```
* Set value to `false` for default vendor path. `'vendor/scrivo/highlight.php/styles'`
* Set folder path **without** trailing slash. i.e `'assets/styles'`
* To use public root folder, set value to empty string. `''`


## Notes
* All css styles for Highlight.php are located at **vendor/scrivo/highlight.php/styles**.
* Themes demo: [https://highlightjs.org/static/demo]
