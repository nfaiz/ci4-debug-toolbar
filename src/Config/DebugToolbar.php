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