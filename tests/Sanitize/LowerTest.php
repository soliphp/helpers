<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class UpperTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "upper");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['TEST', 'TEST'],
            ['tEsT', 'TEST'],
            ['test', 'TEST'],
        ];
    }
}
