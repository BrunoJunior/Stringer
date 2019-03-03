<?php
/**
 * Created by PhpStorm.
 * User: bdesprez
 * Date: 03/03/19
 * Time: 18:57
 */

namespace Stringer\tests\units;

class Stringer extends \atoum
{
    public function testAppend()
    {
        $this
            ->if($this->newTestedInstance(''))
            ->then
                ->object($this->testedInstance->append('a', false))
                    ->toString
                        ->isIdenticalTo('')
            ->and
                ->object($this->testedInstance->append('a'))
                    ->toString
                        ->isIdenticalTo('a');
    }

    public function testappendPrefix()
    {
        $this
            ->if($this->newTestedInstance('a'))
            ->then
                ->object($this->testedInstance->appendWithPrefix(''))
                    ->toString
                        ->isIdenticalTo('a')
            ->and
                ->object($this->testedInstance->appendWithPrefix('b'))
                    ->toString
                        ->isIdenticalTo('a b')
            ->and
                ->object($this->testedInstance->appendWithPrefix('c', '-'))
                    ->toString
                        ->isIdenticalTo('a b-c');
    }

    public function testAppendSeparator()
    {
        $this
            ->if($this->newTestedInstance(''))
            ->then
                ->object($this->testedInstance->appendSeparator(false))
                    ->toString
                        ->isIdenticalTo('')
            ->and
                ->object($this->testedInstance->appendSeparator())
                    ->toString
                        ->isIdenticalTo('-');
    }

    public function testappendSpace()
    {
        $this
            ->if($this->newTestedInstance(''))
            ->then
                ->object($this->testedInstance->appendSpace(false))
                    ->toString
                        ->isIdenticalTo('')
            ->and
                ->object($this->testedInstance->appendSpace())
                    ->toString
                        ->isIdenticalTo(' ');
    }

    public function testPluralize()
    {
        $this
            ->if($this->newTestedInstance(''))
            ->then
                ->object($this->testedInstance->pluralize(false))
                    ->toString
                        ->isIdenticalTo('')
            ->and
                ->object($this->testedInstance->append('test')->pluralize())
                    ->toString
                        ->isIdenticalTo('tests');
    }

    public function testPrepend()
    {
        $this
            ->if($this->newTestedInstance(''))
            ->then
                ->object($this->testedInstance->prepend('a', false))
                    ->toString
                        ->isIdenticalTo('')
            ->and
                ->object($this->testedInstance->prepend('a')->prepend('b'))
                    ->toString
                        ->isIdenticalTo('ba')
            ->and
                ->object($this->testedInstance->prepend(''))
                    ->toString
                        ->isIdenticalTo('ba');
    }
}