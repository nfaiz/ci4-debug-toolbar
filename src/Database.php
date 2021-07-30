<?php

namespace Nfaiz\DebugToolbar;

use \Nfaiz\DebugToolbar\Formatter;

class Database
{
    protected static $queries = [];

    function __construct($queries)
    {
        static::$queries = $queries;
    }

    public function display(): string
    {
        $formatter = new Formatter();

        $queries = [];

        foreach (static::$queries as $query) 
        {
            $queries[] = [
                'duration' => ((float) $query->getDuration(5) * 1000) . ' ms',
                'sql'      => $formatter->highlightSql($query->getQuery()),
            ];
        }

        return $formatter->render($queries, 'Nfaiz\DebugToolbar\Views\database.tpl');
    }
}