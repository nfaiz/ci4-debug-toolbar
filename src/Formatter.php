<?php

namespace Nfaiz\DebugToolbar;

use \Highlight\Highlighter;

class Formatter
{    
    /**
     * Returns Highlighted SQL
     *
     * @return string
     */
    public function highlightSql(string $sql = ''): string
    {
        $hl = new Highlighter();

        try 
        {
            $highlighted = $hl->highlight('sql', $sql);

            return '<code class="hljs hljs-pre-line sql">' . $highlighted->value . '</code>';
        } 
        catch (\DomainException $e) {
            return '<code><pre>' . $sql . '</code></pre>';
        }
    }

    /**
     * Renders Syntax
     *
     * @return string
     */
    public function render(array $queries, string $parserPath): string
    {
        if (empty($queries))
        {
            return '';
        }

        $data = [
            'queries' => $queries,
            'hlstyle' => $this->getStyle()
        ];

        return service('parser')->setData($data)->render($parserPath);
    }

    /**
     * Returns style
     *
     * @return string
     */
    private function getStyle(): string
    {
        $config = config(Toolbar::class);

        $cssList = \HighlightUtilities\getAvailableStyleSheets();

        $light = $this->getLightStyleSheetName($config, $cssList);

        $dark = $this->getDarkStyleSheetName($config, $cssList);

        $darkStyle = str_replace('.hljs', '#toolbarContainer.dark .hljs', \HighlightUtilities\getStyleSheet($dark));

        $style = \HighlightUtilities\getStyleSheet($light) . $darkStyle;

        return <<<STYLE
        <style>
        .hljs-pre-line{white-space:pre-line;margin-bottom:4px;}
        {$style}
        </style>
        STYLE;
    }

    /**
     * Returns Light StyleSyheet Name
     *
     * @return string
     */
    private function getLightStyleSheetName(object $config, array $cssList): string
    {
        if (! isset($config->sqlCssTheme['light']) || ! in_array($config->sqlCssTheme['light'], $cssList, true))
        {
            return 'default';
        }

        return $config->sqlCssTheme['light'];
    }

    /**
     * Returns Dark StyleSyheet Name
     *
     * @return string
     */
    private function getDarkStyleSheetName(object $config, array $cssList): string
    {
        if (! isset($config->sqlCssTheme['dark']) || ! in_array($config->sqlCssTheme['dark'], $cssList, true))
        {
            return 'dark';
        }

        return $config->sqlCssTheme['dark'];
    }

}