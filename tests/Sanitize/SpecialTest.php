<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class SpecialTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "special");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['This is <html> tags', 'This is &#60;html&#62; tags'],
        ];
    }
}
