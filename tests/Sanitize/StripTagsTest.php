<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class StripTagsTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "strip_tags");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['<h1>Hello</h1>', 'Hello'],
            ['<h1><p>Hello</h1>', 'Hello'],
            ['<', ''],
        ];
    }
}
