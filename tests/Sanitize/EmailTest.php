<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "email");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            ['some(one)@exa\\mple.com', 'someone@example.com'],
            [
                '!(first.guy)
                @*my-domain**##.com.rx//', '!first.guy@*my-domain**##.com.rx',
            ],
        ];
    }
}
