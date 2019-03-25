<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class LowerTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "lower");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['test', 'test'],
            ['tEsT', 'test'],
            ['TEST', 'test'],
        ];
    }
}
