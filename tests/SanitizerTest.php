<?php

namespace ItStably\Clickhouse;

use PHPUnit\Framework\TestCase;
use ItStably\Clickhouse\Common\Sanitizer;

/**
 * @covers \ItStably\Clickhouse\Common\Sanitizer
 */
class SanitizerTest extends TestCase
{
    public function testEscapeNumericValue()
    {
        $value = 1;
        $escaped = Sanitizer::escape($value);

        $this->assertEquals($value, $escaped);
    }

    public function testEscapeStringValue()
    {
        $value = "some-test with 'quotes'";
        $escaped = Sanitizer::escape($value);

        $this->assertEquals("'some-test with \'quotes\''", $escaped);

        $value = 'some-test with \'quotes\'';
        $escaped = Sanitizer::escape($value);

        $this->assertEquals("'some-test with \'quotes\''", $escaped);

        $value = 'some-test with / \slashes';
        $escaped = Sanitizer::escape($value);

        $this->assertEquals("'some-test with / \\\\slashes'", $escaped);
    }
}
