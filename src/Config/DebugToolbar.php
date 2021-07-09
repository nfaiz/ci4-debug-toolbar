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
     * String value will set the folder style path to public folder (ROOTPATH/public).
     * Use folder name WITHOUT trailing slash. i.e 'assets/styles'.
     * Leave it blank (empty string) to use public root folder.
     * 
     * 
     * Default value is false (using VENDORPATH <vendorpath/scrivo/highlight.php/styles>).
     * 
     * @var string|bool
     */
    public $dbCssFolder = false;
}