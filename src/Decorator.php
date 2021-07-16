<?php declare(strict_types=1);

/**
 * Class Decorator
 */
class Decorator implements IDecorator
{
    /** @var string */
    private string $pattern;


    /**
     * Decorator constructor.
     * @param string $pattern
     */
    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }


    /**
     * @param string $text
     * @return string
     */
    public function make(string $text): string
    {
        $matches = [];

        if (preg_match($this->pattern, $text, $matches))
        {
            return strtolower($matches[1]);
        }
    }
}