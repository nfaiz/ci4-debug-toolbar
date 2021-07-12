<?php

namespace Nfaiz\DebugToolbar\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Autoload;

class Database extends BaseCommand
{
    protected $group = 'DebugToolbar';

    protected $name = 'debugtoolbar:database';

    protected $description = 'Setup/publish Database DebugToolbar.';

    protected $usage = 'debugtoolbar:database';

    public function run(array $params)
    {
        $this->createDebugToolbarConfig();

        $this->modifyEventsConfig();

        $this->modifyToolbarConfig();
    }

    protected function writeConfigFile(string $filename, string $content)
    {
        $file = $this->getAppConfiGPath() . $filename;
        
        $directory = dirname($file);

        if (! is_dir($directory))
        {
            mkdir($directory, 0777, true);
        }

        if (file_exists($file))
        {
            $overwrite = (bool) CLI::getOption('f');

            if (! $overwrite && CLI::prompt("File '{$filename}' already exists in app/Config. Overwrite?", ['n', 'y']) === 'n')
            {
                CLI::error("Skipped {$filename}.");
                return;
            }
        }

        if (write_file($file, $content))
        {
            CLI::write(CLI::color('Created: ', 'green') . $filename);
        }
        else
        {
            CLI::error("Error creating {$filename}.");
        }
    }

    protected function createDebugToolbarConfig()
    {
        $filename = 'DebugToolbar.php';

        $content = file_get_contents($this->getConfigPath() . $filename);

        $content = str_replace('namespace Nfaiz\DebugToolbar\Config', "namespace Config", $content);

        $content = str_replace("use CodeIgniter\Config\BaseConfig;" . PHP_EOL . PHP_EOL, '', $content);

        $content = str_replace('extends BaseConfig', "extends \Nfaiz\DebugToolbar\Config\DebugToolbar", $content);

        $this->writeConfigFile($filename, $content);
    }

    protected function modifyEventsConfig()
    {
        $filename = 'Events.php';

        $content = file_get_contents($this->getAppConfiGPath() . $filename);

        $content = str_replace(
            "Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');", 
            "// Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect') ;" 
                . PHP_EOL 
                . "        Events::on('DBQuery', 'Nfaiz\DebugToolbar\Collectors\Database::collect');", 
            $content);

        $this->writeConfigFile($filename, $content);
    }

    protected function modifyToolbarConfig()
    {
        $filename = 'Toolbar.php';

        $content = file_get_contents($this->getAppConfiGPath() . $filename);

        $content = str_replace(
            "use CodeIgniter\Debug\Toolbar\Collectors\Database;", 
            "// use CodeIgniter\Debug\Toolbar\Collectors\Database ;" 
                . PHP_EOL 
                . "use Nfaiz\DebugToolbar\Collectors\Database;", 
            $content);

        $this->writeConfigFile($filename, $content);
    }

    protected function getAppConfiGPath()
    {
        $config = new Autoload();

        return $config->psr4['Config'] . DIRECTORY_SEPARATOR;
    }

    protected function getConfigPath()
    {
        $sourcePath = realpath(__DIR__ . '/../');

        if ($sourcePath == '/' || empty($sourcePath))
        {
            CLI::error('Invalid Directory');
            exit();
        }

        return $sourcePath . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR;

    }
}