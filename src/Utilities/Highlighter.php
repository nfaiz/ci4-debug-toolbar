<?php

/* 
 * Deprecated. Will remove later.
 *
 * Please use Highlighter Utilities From highlight.php instead
 *
 */

namespace Nfaiz\DebugToolbar\Utilities;


class Highlighter
{
    /**
     * Returns Available StyleSheets
     * 
     * Set true to return available StyleSheet with paths
     * 
     * @return array
     */
    public static function getAvailableStyleSheets(bool $filePaths = false): array
    {
        return \HighlightUtilities\getAvailableStyleSheets($filePaths);
    }

    /**
     * Returns StyleSheet Path
     * 
     * @return string
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
}