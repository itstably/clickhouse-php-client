<?php

namespace ItStably\Clickhouse;

use PHPUnit\Framework\TestCase;
use ItStably\Clickhouse\Common\FileFromString;

/**
 * @covers \ItStably\Clickhouse\Common\AbstractFile
 * @covers \ItStably\Clickhouse\Common\FileFromString
 */
class FileFromStringTest extends TestCase
{
    public function testFile()
    {
        $fileContent = [];

        for ($i = 0; $i < 100; $i++) {
            $fileContent[] = $i.PHP_EOL;
        }

        $result = implode('', $fileContent);

        $file = new FileFromString($result);
        $stream = $file->open(false);

        $this->assertEquals($result, $stream->getContents(), 'Correctly reads content from file without encoding');
    }

    public function testFileWithGzip()
    {
        $fileContent = [];

        for ($i = 0; $i < 100; $i++) {
            $fileContent[] = $i.PHP_EOL;
        }

        $result = implode('', $fileContent);

        $file = new FileFromString($result);
        $stream = $file->open();

        $this->assertEquals($result, gzdecode($stream->getContents()), 'Correctly reads content from file with encoding');
    }
}
