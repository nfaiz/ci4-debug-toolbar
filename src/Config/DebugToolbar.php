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
