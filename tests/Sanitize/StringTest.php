<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSanitize($value, $expected)
    {
        $actual = sanitize($value, "string");
        $this->assertEquals($expected, $actual);
    }

    public function getData()
    {
        return [
            [
                'abcdefghijklmnopqrstuvwzyx1234567890!@#$%^&*()_ `~=+<>',
                'abcdefghijklmnopqrstuvwzyx1234567890!@#$%^&*()_ `~=+',
            ],
            [
                "{[<within french quotes>]}",
                '{[]}',
            ],
            [
                'buenos días123καλημέρα!@#$%^&*早安()_ `~=+<>',
                'buenos días123καλημέρα!@#$%^&*早安()_ `~=+',
            ],
            [
                '{[<buenos días 123 καλημέρα! 早安>]}',
                '{[]}',
            ],

        ];
    }
}
