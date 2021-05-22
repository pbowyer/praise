<?php
namespace tests;

use bowyer\Praise\Praise;
use PHPUnit\Framework\TestCase;

class ValidJsonTest extends TestCase
{
    private $path = __DIR__.'/../data/';

    public function testDecodeAdjectiveJson()
    {

        $json = \json_decode(file_get_contents($this->path.'adjective.json'), true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($json);
        self::assertGreaterThan(1, count($json));
    }
    public function testDecodeAdverb()
    {
        $json = \json_decode(file_get_contents($this->path.'adverb.json'), true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($json);
        self::assertGreaterThan(1, count($json));
    }
    public function testDecodeCreated()
    {
        $json = \json_decode(file_get_contents($this->path.'created.json'), true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($json);
        self::assertGreaterThan(1, count($json));
    }
    public function testDecodeCreating()
    {
        $json = \json_decode(file_get_contents($this->path.'creating.json'), true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($json);
        self::assertGreaterThan(1, count($json));
    }
    public function testDecodeExclamation()
    {
        $json = \json_decode(file_get_contents($this->path.'exclamation.json'), true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($json);
        self::assertGreaterThan(1, count($json));
    }
    public function testDecodeSmiley()
    {
        $json = \json_decode(file_get_contents($this->path.'smiley.json'), true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($json);
        self::assertGreaterThan(1, count($json));
    }
}