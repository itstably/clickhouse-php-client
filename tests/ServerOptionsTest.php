<?php

namespace ItStably\Clickhouse;

use PHPUnit\Framework\TestCase;
use ItStably\Clickhouse\Common\ServerOptions;

/**
 * @covers \ItStably\Clickhouse\Common\ServerOptions
 */
class ServerOptionsTest extends TestCase
{
    public function testServerOptions()
    {
        $options = new ServerOptions();

        $this->assertEquals('http', $options->getProtocol(), 'Sets correct default protocol');

        $options->setProtocol('https');

        $this->assertEquals('https', $options->getProtocol(), 'Sets correct protocol');
    }
}
