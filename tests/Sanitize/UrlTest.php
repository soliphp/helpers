<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "url");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['http://juhara��.co�m', 'http://juhara.com'],
        ];
    }
}
