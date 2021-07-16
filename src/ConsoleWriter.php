<?php declare(strict_types=1);

/**
 * Class ConsoleWriter
 */
class ConsoleWriter implements IOutput
{
    /**
     * @param string $text
     */
    public function write(string $text):void
    {
        echo "{$text}\n";
    }
}