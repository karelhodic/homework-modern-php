<?php declare(strict_types=1);

/**
 * Class Filter
 */
class Filter implements IFilter
{
    /** @var string[] */
    private array $filterArray = [];


    /**
     * @param string $text
     */
    public function addFilter(string $text): void
    {
        $this->filterArray[$text] = $text;
    }


    /**
     * @param string $text
     * @return bool
     */
    public function isValid(string $text): bool
    {
        return !isset($this->filterArray[$text]);
    }
}