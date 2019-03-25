<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class FloatTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "float");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['1000.01', 1000.01],
            [0xFFA, 0xFFA],
            ['lol', 0.0],
        ];
    }
}
