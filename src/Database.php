<?php

namespace Nfaiz\DebugToolbar;

class Database
{    
    /**
     * Returns Highlighted SQL
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
     * Renders Syntax
     *
     * @return string
     */
    public function render(array $queries): string
    {
        if (empty($queries))
        {
            return '';
        }

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

        $cssList = \HighlightUtilities\getAvailableStyleSheets();

        $light = ! isset($config->sqlCssTheme['light']) || ! in_array($config->sqlCssTheme['light'], $cssList, true)
            ? 'default' 
            : $config->sqlCssTheme['light'];
        
        $dark = ! isset($config->sqlCssTheme['dark']) || ! in_array($config->sqlCssTheme['dark'], $cssList, true)
            ? 'dark' 
            : $config->sqlCssTheme['dark'];

        $darkStyle = str_replace('.hljs', '#toolbarContainer.dark .hljs', \HighlightUtilities\getStyleSheet($dark));

        $style = \HighlightUtilities\getStyleSheet($light) . $darkStyle;

        return <<<STYLE
        <style>
        .hljs-pre-line{white-space:pre-line;margin-bottom:14px;margin-top:14px}
        {$style}
        </style>
        STYLE;
    }
}