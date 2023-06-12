<?php

namespace src\importers;

use src\interfaces\ReadersInterface;
use src\interfaces\WritersInterface;

abstract class AbstractImporter
{
    private ReadersInterface $reader;

    private WritersInterface $writer;

    abstract public function __construct();

    /**
     * @return ReadersInterface
     */
    public function getReader(): ReadersInterface
    {
        return $this->reader;
    }

    /**
     * @param mixed $reader
     */
    public function setReader($reader): void
    {
        $this->reader = $reader;
    }

    /**
     * @return WritersInterface
     */
    public function getWriter(): WritersInterface
    {
        return $this->writer;
    }

    /**
     * @param mixed $writer
     */
    public function setWriter($writer): void
    {
        $this->writer = $writer;
    }

    public function execute(): void
    {
        $this->writer->run();
    }
}