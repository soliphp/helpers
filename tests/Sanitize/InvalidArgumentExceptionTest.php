<?php

namespace Soli\Tests\Sanitize;

use PHPUnit\Framework\TestCase;

class InvalidArgumentExceptionTest extends TestCase
{
    /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /Sanitize filter \w+ is not supported/
     */
    public function testSanitizeInvalidArgumentException()
    {
        sanitize("100", "InvalidArgument");
    }
}
