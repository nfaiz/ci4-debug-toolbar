# Changelog

## [v1.2.3](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.2.2...v1.2.3) - 2021-07-17

### Bug Fixed
- Fix composer

## [v1.2.2](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.2.1...v1.2.2) - 2021-07-17

### Bug Fixed
- Missing return value.

## [v1.2.1](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.2.0...v1.2.1) - 2021-07-15

- Fix Composer file. Fix docs

## [v1.2.0](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.1.4...v1.2.0) - 2021-07-15

### Enhancement

- New service `service('highlighter')`. See [here](README.md#utilities) for usage.

### Removed

- `$dbCsspath`. Use pre-installed CSS themes only.
- `app/Config/DebugToolbar`. Use `app/Config/Toolbar.php` instead.

### Changed

- Use `$sqlCssTheme` property instead of `$dbCss`
- Use CSS theme `name` instead of CSS theme `file`. (Now WITHOUT .css extension).
- Use `light` instead of `default` key for `$sqlCssTheme`.


## [v1.1.4](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.1.3...v1.1.4) - 2021-07-10

### Changed

- Default CSS theme from `dracula.css` to `default.css`


## [v1.1.3](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.1.2...v1.1.3) - 2021-07-10

### Changed

- `$dbCssFolder` variable to `$dbCsspath` in **app\Config\DebugToolbar.php**


## [v1.1.2](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.1.1...v1.1.2) - 2021-09-09

### Changed

- Documentations


## [v1.1.1](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.0.2-beta...v1.1.1) - 2021-09-09

### Enhancement

- Added CLI Command `debugtoolbar:database` for easy setup method.


## [v1.0.2-beta](https://github.com/nfaiz/ci4-debug-toolbar/compare/v1.0.0...v1.0.2-beta) - 2021-07-08

### Enhancement

- Added configuration ability using **app\Config\DebugToolbar.php**


## [v1.0.0](https://github.com/nfaiz/ci4-debug-toolbar/releases/tag/v1.0.0) - 2021-07-04

### Added

- Initial release
