<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class TrimTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "trim");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['    Hello', 'Hello'],
            ['Hello    ', 'Hello'],
            ['  Hello    ', 'Hello'],
        ];
    }
}
