    
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
}