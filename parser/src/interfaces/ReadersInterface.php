<?php

namespace src\interfaces;

interface ReadersInterface
{
    public function __construct(string $filePath);

    public function parseFile(): void;

    public function getData(): array;

    public function getElement();

    public function getElements(): array;

    public function getCountElements(): int;
}