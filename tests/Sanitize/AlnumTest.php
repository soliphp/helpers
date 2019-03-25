<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class AlnumTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "alnum");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['0', 0],
            ['', null],
            ['?a&5xka\tŧ?1-s.Xa[\n', 'a5xkat1sXan'],
        ];
    }
}
