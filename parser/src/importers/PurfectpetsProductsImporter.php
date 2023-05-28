<?php

namespace src\importers;

use src\Main;
use src\readers\PurfectpetsProductsReader;
use src\writers\custom\purfectpets_local\PurfectpetsProductsWriter;

class PurfectpetsProductsImporter extends AbstractImporter
{
    public function __construct(){
        $options = Main::getConfigValue('settings.purfectpets-local');

        $this->setReader(new PurfectpetsProductsReader($options['parse_section_link']));

        $this->setWriter(new PurfectpetsProductsWriter($this->getReader(), $options));
    }
}