<?php declare(strict_types=1);

/**
 * Class LogGroupList
 */
class LogGroupList implements \Iterator
{

    /** @var array */
    private array $list = [];


    /**
     * Add text
     * @param string $text
     */
    public function add(string $text): void
    {
        if (!isset($this->list[$text]))
        {
            $this->list[$text] = 1;

            return;
        }

        $this->list[$text]++;
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->list);
    }


    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return key($this->list) . ': ' . current($this->list);
    }


    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return string|float|int|bool|null scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->list);
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->list);
    }


    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return isset($this->list[key($this->list)]);
    }


}