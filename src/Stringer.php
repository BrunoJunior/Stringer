<?php
/**
 * Created by PhpStorm.
 * User: bdesprez
 * Date: 02/03/19
 * Time: 00:26
 */

namespace Stringer;

/**
 * Class Stringer
 * @package Stringer
 */
class Stringer
{
    const SPACE = ' ';
    const EMPTY = '';
    const PLURAL = 's';
    const SEPARATOR = '-';

    /**
     * @var string
     */
    private $string;

    /**
     * StringConcat constructor.
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * @param string $string
     * @param bool $ifEmpty
     * @return $this|Stringer
     */
    public function append(string $string, bool $ifEmpty = true): self
    {
        if ($ifEmpty || !$this->isEmpty()) {
            $this->appendWithPrefix($string, static::EMPTY);
        }
        return $this;
    }

    /**
     * @param string $string
     * @param bool $ifEmpty
     * @return Stringer
     */
    public function prepend(string $string, bool $ifEmpty = true): self
    {
        if ($ifEmpty || !$this->isEmpty()) {
            $this->string = $string . $this;
        }
        return $this;
    }

    /**
     * @param bool $ifEmpty
     * @return Stringer
     */
    public function appendSpace(bool $ifEmpty = true): self
    {
        return $this->append(static::SPACE, $ifEmpty);
    }

    /**
     * @param bool $ifEmpty
     * @return Stringer
     */
    public function appendSeparator(bool $ifEmpty = true): self
    {
        return $this->append(static::SEPARATOR, $ifEmpty);
    }

    /**
     * @param string $string
     * @param string $prefix
     * @return Stringer
     */
    public function appendWithPrefix(string $string, string $prefix = self::SPACE): self
    {
        if ($string !== static::EMPTY) {
            $this->string = $this . $prefix . $string;
        }
        return $this;
    }

    /**
     * @param bool $ifEmpty
     * @return Stringer
     */
    public function pluralize(bool $ifEmpty = true): self
    {
        return $this->append(static::PLURAL, $ifEmpty);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->string === static::EMPTY;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->string;
    }
}