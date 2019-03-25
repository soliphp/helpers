<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class AbsIntTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "absint");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            [-125, 125],
            ['-125', 125],
            ['-!1a2b5', 125],
        ];
    }
}
