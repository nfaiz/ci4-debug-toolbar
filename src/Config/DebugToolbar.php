<?php

namespace Nfaiz\DebugToolbar\Config;

use CodeIgniter\Config\BaseConfig;

class DebugToolbar extends BaseConfig
{
    /**
     * -------------------------
     * dbTheme configuration
     * -------------------------
     * 
     * Configuration for default and dark theme using Highlight.php
     * Css file can be found at <vendorpath/scrivo/highlight.php/styles> directory.
     * 
     * @var array
     */ 
    public $dbTheme = [
        'default' => 'default.css',
        'dark'    => 'dracula.css'
    ];

}