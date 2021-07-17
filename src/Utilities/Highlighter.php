<?php

namespace Nfaiz\DebugToolbar\Utilities;

class Highlighter
{
    /**
     * Returns Available StyleSheets
     * 
     * Set true to return available StyleSheet with paths
     * 
     * @param bool
     * 
     * @return array
     */
    public static function getAvailableStyleSheets(bool $filePaths = false): array
    {
        return \HighlightUtilities\getAvailableStyleSheets($filePaths);
    }

    /**
     * Returns StyleSheet Folder
     * 
     * 
     * @return string
     */
    public static function getStyleSheetFolder(): string
    {
        return \HighlightUtilities\getStyleSheetFolder();
    }

    /**
     * Returns StyleSheet Path
     * 
     * @param string
     * 
     * @return mixed
     */
    public static function getStyleSheetPath(string $name): string
    {
        try {
            return \HighlightUtilities\getStyleSheetPath($name);
        }
        catch (\DomainException $e) {
            throw new \DomainException(
                $e->getMessage() . " Use service('highlighter')->getAvailableStyleSheets(); to get available stylesheets."
            );
        }
    }

    public static function getStyleSheet(string $name)
    {
        try {
            return \HighlightUtilities\getStyleSheet($name);
        }
        catch (\DomainException $e) {
            throw new \DomainException($e->getMessage());
        }
    }

    /**
     * Returns highlighted SQL syntax.
     *
     * @param string $sql
     *
     * @return string
     */
    public function highlightSql(string $sql = ''): string
    {
        $hl = new \Highlight\Highlighter();

        try {
            $highlighted = $hl->highlight('sql', $sql);

            return '<code class="hljs hljs-pre-line sql">' . $highlighted->value . '</code>';
        } 
        catch (\DomainException $e) {
            return '<code><pre>' . $sql . '</code></pre>';
        }
    }

    /**
     * Render
     *
     * @param string $queries
     *
     * @return string
     */
    public function render($queries): string
    {
        $data = [
            'queries' => $queries, 
            'hlstyle' => $this->getStyle()
        ];

        return service('parser')->setData($data)->render('Nfaiz\DebugToolbar\Views\database.tpl');
    }

    /**
     * Returns style
     *
     * @return string
     */
    private function getStyle(): string
    {
        $config = config(Toolbar::class);

        $cssList = $this->getAvailableStyleSheets();

        $light = ! isset($config->sqlCssTheme['light']) || ! in_array($config->sqlCssTheme['light'], $cssList, true)
            ? 'default' 
            : $config->sqlCssTheme['light'];
        
        $dark = ! isset($config->sqlCssTheme['dark']) || ! in_array($config->sqlCssTheme['dark'], $cssList, true)
            ? 'dark' 
            : $config->sqlCssTheme['dark'];

        $style = $this->getStyleSheet($light);

        $darkStyle = $this->getStyleSheet($dark);

        $style .= str_replace('.hljs', '#toolbarContainer.dark .hljs', $darkStyle);

        return <<<STYLE
        <style>
        .hljs-pre-line{white-space:pre-line;margin-bottom:14px}
        {$style}
        </style>
        STYLE;
    }
}