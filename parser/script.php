<?php
require_once 'src/autoload.php';

const ROOT_DIR = __DIR__;

use src\Main;

$main = new Main();

$main->importArray([
    //\src\importers\PurfectpetsSectionsImporter::class,
    \src\importers\PurfectpetsProductsImporter::class
]);