<?php

namespace src\importers;

use src\importers\AbstractImporter;
use src\Main;
use src\readers\PurfectpetsSectionReader;
use src\writers\custom\purfectpets_local\PurfectpetsSectionWriter;

class PurfectpetsSectionsImporter extends AbstractImporter
{
    public function __construct(){
        $options = Main::getConfigValue('settings.purfectpets-local');

        $this->setReader(new PurfectpetsSectionReader($options['parse_sections_link']));

        $this->setWriter(new PurfectpetsSectionWriter($this->getReader(), $options));
    }
}