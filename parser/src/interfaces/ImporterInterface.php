<?php

namespace src\interfaces;

interface ImporterInterface {
    public function __construct();
    
    public function run();
}