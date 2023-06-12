<?php

namespace src\interfaces;

interface WritersInterface
{
    public function __construct(ReadersInterface $reader, array $options = []);

    public function run(): void;
}