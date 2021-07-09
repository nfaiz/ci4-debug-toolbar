<?php

namespace Nfaiz\DebugToolbar\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Autoload;

class Database extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'DebugToolbar';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'DebugToolbar:database';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Setup Database DebugToolbar.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'DebugToolbar:database';

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $this->createDebugToolbarConfig();
        $this->modifyEventsConfig();
        $this->modifyToolbarConfig();
    }

    protected function writeConfigFile(string $path, string $content)
    {
        $filename = $this->getConfiGPath() . $path;
        $directory = dirname($filename);

        if (! is_dir($directory))
        {
            mkdir($directory, 0777, true);
        }

        if (file_exists($filename))
        {
            $overwrite = (bool) CLI::getOption('f');

            if (! $overwrite && CLI::prompt("File '{$path}' already exists in destination. Overwrite?", ['n', 'y']) === 'n')
            {
                CLI::error("Skipped {$path}.");
                return;
            }
        }

        if (write_file($filename, $content))
        {
            CLI::write(CLI::color('Created: ', 'green') . $path);
        }
        else
        {
            CLI::error("Error creating {$path}.");
        }
    }

    protected function createDebugToolbarConfig()
    {
        $sourcePath = realpath(__DIR__ . '/../');

        if ($sourcePath == '/' || empty($sourcePath))
        {
            CLI::error('Invalid Directory');
            exit();
        }

        $path = $sourcePath . '/Config/DebugToolbar.php';

        $content = file_get_contents($path);
        $content = str_replace('namespace Nfaiz\DebugToolbar\Config', "namespace Config", $content);
        $content = str_replace("use CodeIgniter\Config\BaseConfig;".PHP_EOL.PHP_EOL, '', $content);
        $content = str_replace('extends BaseConfig', "extends \Nfaiz\DebugToolbar\Config\DebugToolbar", $content);

        $this->writeConfigFile("DebugToolbar.php", $content);
    }

    protected function modifyEventsConfig()
    {
        $filename = $this->getConfiGPath() . 'Events.php';

        $content = file_get_contents($filename);

        $content = str_replace(
            "Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');", 
            "// Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect') ! commented".PHP_EOL."        Events::on('DBQuery', 'Nfaiz\DebugToolbar\Collectors\Database::collect');", 
            $content);

        $this->writeConfigFile("Events.php", $content);
    }

    protected function modifyToolbarConfig()
    {
        $filename = $this->getConfiGPath() . 'Toolbar.php';

        $content = file_get_contents($filename);

        $content = str_replace(
            "use CodeIgniter\Debug\Toolbar\Collectors\Database;", 
            "// use CodeIgniter\Debug\Toolbar\Collectors\Database ! commented".PHP_EOL."use Nfaiz\DebugToolbar\Collectors\Database;", 
            $content);

        $this->writeConfigFile("Toolbar.php", $content);
    }

    protected function getConfiGPath()
    {
        $config = new Autoload();

        return $config->psr4['Config'] . DIRECTORY_SEPARATOR;

    }

}