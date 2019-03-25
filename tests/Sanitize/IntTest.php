<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class IntTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "int");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            [1000, 1000],
            [0xFFA, 0xFFA],
            ['1000', '1000'],
            ['lol', 0],
            ['!100a019.01a', 10001901],
        ];
    }
}
