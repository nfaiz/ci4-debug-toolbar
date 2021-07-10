<?php

/**
 * This file is not part of the CodeIgniter 4 framework.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nfaiz\DebugToolbar\Collectors;

use CodeIgniter\Database\Query;
use CodeIgniter\Debug\Toolbar\Collectors\BaseCollector;
use Highlight\Highlighter;
use Nfaiz\DebugToolbar\Config\DebugToolbar;

/**
 * Collector for the Database tab of the Debug Toolbar.
 */
class Database extends BaseCollector
{
    /**
     * Whether this collector has timeline data.
     *
     * @var bool
     */
    protected $hasTimeline = true;

    /**
     * Whether this collector should display its own tab.
     *
     * @var bool
     */
    protected $hasTabContent = true;

    /**
     * Whether this collector has data for the Vars tab.
     *
     * @var bool
     */
    protected $hasVarData = false;

    /**
     * The name used to reference this collector in the toolbar.
     *
     * @var string
     */
    protected $title = 'Database';

    /**
     * Array of database connections.
     *
     * @var array
     */
    protected $connections;

    /**
     * The query instances that have been collected
     * through the DBQuery Event.
     *
     * @var Query[]
     */
    protected static $queries = [];

    //--------------------------------------------------------------------

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->connections = \Config\Database::getConnections();
    }

    //--------------------------------------------------------------------

    /**
     * The static method used during Events to collect
     * data.
     *
     * @param Query $query
     *
     * @internal param $ array \CodeIgniter\Database\Query
     */
    public static function collect(Query $query)
    {
        $config = config('Toolbar');

        // Provide default in case it's not set
        $max = $config->maxQueries ?: 100;

        if (count(static::$queries) < $max) {
            static::$queries[] = $query;
        }
    }

    //--------------------------------------------------------------------

    /**
     * Returns timeline data formatted for the toolbar.
     *
     * @return array The formatted data or an empty array.
     */
    protected function formatTimelineData(): array
    {
        $data = [];

        foreach ($this->connections as $alias => $connection) {
            // Connection Time
            $data[] = [
                'name'      => 'Connecting to Database: "' . $alias . '"',
                'component' => 'Database',
                'start'     => $connection->getConnectStart(),
                'duration'  => $connection->getConnectDuration(),
            ];
        }

        foreach (static::$queries as $query) {
            $data[] = [
                'name'      => 'Query',
                'component' => 'Database',
                'start'     => $query->getStartTime(true),
                'duration'  => $query->getDuration(),
            ];
        }

        return $data;
    }

    //--------------------------------------------------------------------

    /**
     * Returns the data of this collector to be formatted in the toolbar
     *
     * @return string
     */
    public function display(): string
    {
        $data['hlstyle'] = $this->getStyle();

        foreach (static::$queries as $query) {
            $data['queries'][] = [
                'duration' => ($query->getDuration(5) * 1000) . ' ms',
                'sql'      => $this->highlightSql($query->getQuery()),
            ];
        }

        return Service('parser')
            ->setData($data)
            ->render('Nfaiz\DebugToolbar\Views\database.tpl');
    }

    //--------------------------------------------------------------------

    /**
     * Gets the "badge" value for the button.
     *
     * @return int
     */
    public function getBadgeValue(): int
    {
        return count(static::$queries);
    }

    //--------------------------------------------------------------------

    /**
     * Information to be displayed next to the title.
     *
     * @return string The number of queries (in parentheses) or an empty string.
     */
    public function getTitleDetails(): string
    {
        return '(' . count(static::$queries) . ' Queries across ' . ($countConnection = count($this->connections)) . ' Connection' .
            ($countConnection > 1 ? 's' : '') . ')';
    }

    //--------------------------------------------------------------------

    /**
     * Does this collector have any data collected?
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty(static::$queries);
    }

    //--------------------------------------------------------------------

    /**
     * Display the icon.
     *
     * Icon from https://icons8.com - 1em package
     *
     * @return string
     */
    public function icon(): string
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADMSURBVEhLY6A3YExLSwsA4nIycQDIDIhRWEBqamo/UNF/SjDQjF6ocZgAKPkRiFeEhoYyQ4WIBiA9QAuWAPEHqBAmgLqgHcolGQD1V4DMgHIxwbCxYD+QBqcKINseKo6eWrBioPrtQBq/BcgY5ht0cUIYbBg2AJKkRxCNWkDQgtFUNJwtABr+F6igE8olGQD114HMgHIxAVDyAhA/AlpSA8RYUwoeXAPVex5qHCbIyMgwBCkAuQJIY00huDBUz/mUlBQDqHGjgBjAwAAACexpph6oHSQAAAAASUVORK5CYII=';
    }

    //--------------------------------------------------------------------

    /**
     * Returns highlight.js style
     *
     * @return string
     */
    private function getStyle(): string
    {
        $config = config(DebugToolbar::class);

        $defaultPath = VENDORPATH . join(DIRECTORY_SEPARATOR, ['scrivo', 'highlight.php', 'styles']);

        if (! isset($config->dbCssPath)) 
        {
            $directory = $defaultPath;
        } 
        else
        {
            $directory = is_bool($config->dbCssPath)
                ? $defaultPath
                : ROOTPATH . 'public' . DIRECTORY_SEPARATOR . $config->dbCssPath;
        }

        $style = @file_get_contents($directory . DIRECTORY_SEPARATOR . $config->dbCss['default'])
            ?: file_get_contents($defaultPath  . DIRECTORY_SEPARATOR . 'default.css');

        $darkStyle = @file_get_contents($directory  . DIRECTORY_SEPARATOR . $config->dbCss['dark'])
            ?: file_get_contents($defaultPath  . DIRECTORY_SEPARATOR . 'dark.css');

        $style .= str_replace('.hljs', '#toolbarContainer.dark .hljs', $darkStyle);

        return <<<STYLE
        <style>
        .hljs-pre-line{white-space:pre-line;margin-bottom:4px}
        {$style}
        </style>
        STYLE;
    }

    //--------------------------------------------------------------------

    /**
     * Returns highlighted SQL syntax
     *
     * @param string $sql
     *
     * @return string
     */
    private function highlightSql(string $sql = ''): string
    {
        $highlighter = new Highlighter();

        try {
            $highlighted = $highlighter->highlight('sql', $sql);
            $text = '<code class="hljs hljs-pre-line ' . $highlighted->language . '">';
            $text .= $highlighted->value;
            $text .= '</code>';
        } catch (\DomainException $e) {
            $text .= '<code>' . $sql . '</code>';
        }

        return $text;
    }
}
