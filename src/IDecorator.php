<?php declare(strict_types=1);

/**
 * Class IDecorator
 */
interface IDecorator
{
    /**
     * @param string $text
     * @return ?string
     */
    public function make(string $text): ?string;
}