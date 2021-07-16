<?php declare(strict_types=1);

/**
 * Interface IFilter
 */
interface IFilter
{
    /**
     * @param string $text
     * @return bool
     */
    public function isValid(string $text): bool;
}