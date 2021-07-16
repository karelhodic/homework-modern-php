<?php declare(strict_types=1);

/**
 * Interface Output
 */
interface IOutput
{
    /**
     * @param string $text
     */
    public function write(string $text): void;
}