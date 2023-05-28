<?php

namespace src;

use OutOfBoundsException;

use src\importers\AbstractImporter;
use src\utils\Config;

class Main
{

    /** @var mixed */
    private static $config;

    public function __construct()
    {
        self::$config = new Config(
            __DIR__.'/config/settings.json', Config::JSON
        );
    }

    /**
     * @param string $key
     *
     * @return array|string|null
     *
     * Get messages from Settings.yml config
     */
    public static function getConfigValue(string $key)
    {
        $value = self::$config->getNested($key);

        if ($value === null) {
            throw new OutOfBoundsException('Нет такой настройки');
        }
        return $value;
    }

    /**
     * @param array $importers
     *
     * @return void
     */
    public function importArray(array $importers): void
    {
        foreach ($importers as $importer) {
            $this->import($importer);
        }
    }

    /**
     * @param string $importer
     */
    public function import(string $importer): void
    {
        /** @var AbstractImporter $import */
        $import = new $importer();
        $import->execute();
    }
}