![GitHub](https://img.shields.io/github/license/nfaiz/ci4-debug-toolbar)
![GitHub repo size](https://img.shields.io/github/repo-size/nfaiz/ci4-debug-toolbar?label=size)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=nfaiz/ci4-debug-toolbar)

# ci4-debug-toolbar
SQL Syntax Highlighter for CodeIgniter 4 Database Debug Toolbar.

## Description
Make CodeIgniter 4 Database Debug Toolbar SQL Syntax to be **more readable and themeable**.<br />

## Table of contents
  * [Requirement](Requirement)
  * [Installation](#installation)
  * [Setup](#setup)
  * [Usage](#usage)
    * [Change stylesheet](#change-stylesheet)
    * [Utilities](#utilities)
  * [Screenshot](#screenshots)
    * [Default database toolbar](#default-database-toolbar)
    * [After Using Highlighter](#after-using-highlighter)
    * [Another Example](#another-example)
  * [Credit](#credit)


## Requirement
* [Codeigniter 4](https://github.com/codeigniter4/CodeIgniter4)
* [Highlight.php](https://github.com/scrivo/highlight.php)


## Installation
Install libarry via composer:

    composer require nfaiz/ci4-debug-toolbar

Or refer [here](docs/MANUAL.md#installation) for manual installation.


## Setup
Libary setup can be done via spark:

    php spark debugtoolbar:database

This command will try to overwrite some content in **app/Config/Events.php** and **app/Config/Toolbar.php**.<br /> 
Choose overwrite [`y`] when prompted.

Or refer [here](docs/MANUAL.md#setup) for manual setup.<br />


After library installation (composer) and setup (spark) are completed, refresh page to see result.
See [usage](#usage) to configure with other pre-installed stylesheet themes.


## Usage

### Change StyleSheet
Open **app/Config/Toolbar.php**.

Find `$sqlCssTheme` property.

```php
    public $sqlCssTheme = [
        'light' => 'github',
        'dark'  => 'dracula'
    ];
```
* `light` and `dark` are mode options for CodeIghniter 4 debug toolbar.
* Assign stylesheet name without `.css` extension. E.g `'github'`
* Available stylesheets can be found using [utilities](#utilities) 

### Utilities
`service('highlighter')`

Available method/function:
* `getAvailableStyleSheets(bool: false)` to get available stylesheets.
* `getStyleSheetPath(string: styleSheetName)` to get specific stylesheet path.

E.g In **Controller**

```php
    // Get available stylesheets.
    $list = service('highlighter')->getAvailableStyleSheets();
    d($list);

    // Set true to get available stylesheets with absolute path.
    $listPath = service('highlighter')->getAvailableStyleSheets(true);
    d($listPath);

    // Get specific stylesheet path.
    $path = service('highlighter')->getStyleSheetPath('github');
    d($path);
```

## Screenshot

### Default Database Toolbar

* Light<br />
<img src="https://user-images.githubusercontent.com/1330109/125154813-894c0b80-e18e-11eb-8bf3-4e6834437ad9.png" alt="Light mode">

* Dark<br />
<img src="https://user-images.githubusercontent.com/1330109/125154888-ef389300-e18e-11eb-88f6-7f066ec09775.png" alt="Dark mode">

### After using highlighter

* Light (using default.css)<br />
<img src="https://user-images.githubusercontent.com/1330109/125154946-450d3b00-e18f-11eb-982f-93fcc3d09e06.png" alt="Light mode">

* Dark (using dark.css)<br />
<img src="https://user-images.githubusercontent.com/1330109/125155349-bf3ebf00-e191-11eb-922f-8b9bd9f12df8.png" alt="Dark mode">

### Another example

* Light (using atom-one-light.css)
<img src="https://user-images.githubusercontent.com/1330109/125155187-bb5e6d00-e190-11eb-91a5-b4c2f7da46e4.png" alt="Light mode">

* Dark (using atom-one-dark.css)
<img src="https://user-images.githubusercontent.com/1330109/125155379-fca34c80-e191-11eb-981f-8fb6e8df9794.png" alt="Dark mode">

## Credit
Inspired by this [pull request](https://github.com/codeigniter4/CodeIgniter4/pull/3515)