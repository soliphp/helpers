<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class AlphaTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "alpha");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['0', ''],
            ['', null],
            ['a5@xkat1s!Xan', 'axkatsXan'],
        ];
    }
}
