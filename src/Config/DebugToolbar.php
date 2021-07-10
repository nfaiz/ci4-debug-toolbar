<?php

namespace Nfaiz\DebugToolbar\Config;

use CodeIgniter\Config\BaseConfig;

class DebugToolbar extends BaseConfig
{
    /**
     * -------------------------
     * dbCss
     * -------------------------
     * 
     * Database Debug Toolbar CSS styling
     * 
     * dbCss configurations (default and dark).
     * List of CSS files are available in VENDORPATH ('vendor/scrivo/highlight.php/styles').
     * 
     * 
     * @var array
     */
    public $dbCss = [
        'default' => 'dracula.css',
        'dark'    => 'dark.css'
    ];

    /**
     * -------------------------
     * dbCssPath
     * -------------------------
     * 
     * Path for Database Debug Toolbar CSS styling.
     * 
     * Default value is false (using 'vendor/scrivo/highlight.php/styles').
     * 
     * Set value to string (will use 'ROOTPATH/public/').
     * Set string value WITHOUT trailing slash (i.e 'assets/styles' or '').
     * 
     * @var string|bool
     */
    public $dbCssPath = false;
}