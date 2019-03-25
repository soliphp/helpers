<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class SpecialFullTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "special_full");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['This is <html> tags', 'This is &lt;html&gt; tags'],
        ];
    }
}
