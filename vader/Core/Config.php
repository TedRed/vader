<?php

namespace Vader\Core;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Config
 * @package Vader\Core
 */
class Config
{

    /**
     * @var array
     */
    private static $configInstances = [];

    /**
     * Config constructor.
     * @param $appDir
     */
    public function __construct($appDir)
    {
        $configDir = $appDir . '/config';
        $files = scandir($configDir);
        $fileLocator = new FileLocator([$configDir]);
        if (is_array($files)) {
            foreach ($files as $file) {
                $path_parts = pathinfo($file);
                if (in_array($path_parts['extension'], ['yaml', 'xml'])) {
                    $filePath = $fileLocator->locate($file, null, false);
                    self::$configInstances[$path_parts['filename']] = Yaml::parse(file_get_contents($filePath[0]));
                }
            }
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getConfig($name)
    {
        return self::$configInstances[$name];
    }
}
