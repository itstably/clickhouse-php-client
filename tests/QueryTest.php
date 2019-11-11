<?php

namespace ItStably\Clickhouse;

use PHPUnit\Framework\TestCase;
use ItStably\Clickhouse\Common\File;
use ItStably\Clickhouse\Common\Format;

/**
 * @covers \ItStably\Clickhouse\Query
 */
class QueryTest extends TestCase
{
    public function testGetters()
    {
        $server = new Server('127.0.0.1');
        $files = [
            new File('file', Format::CSV),
        ];
        $settings = [
            'setting' => 'value',
        ];

        $query = new Query($server, 'select * from table', $files, $settings);

        $this->assertEquals($server, $query->getServer(), 'Returns correct server passed to constructor');
        $this->assertEquals('select * from table', $query->getQuery(), 'Returns correct query passed to constructor');
        $this->assertEquals($files, $query->getFiles(), 'Returns correct files passed to constructor');
        $this->assertEquals($settings, $query->getSettings(), 'Returns correct settings passed to constructor');
    }
}
