<?php
namespace tests;

use bowyer\Praise\Praise;
use PHPUnit\Framework\TestCase;

// Get the same data every time
mt_srand(1);

class PraiseTest extends TestCase
{
    public function testPraiseAsMethod()
    {
        self::assertEquals("You are stonking!", (new Praise())->say());
    }

    public function testPraiseStatic()
    {
        self::assertEquals("You are super-good!", Praise::praise());
    }

    public function testInvalidPlaceholder()
    {
        $praise = new Praise();
        self::assertEquals('{{missing}} is missing', $praise->say("{{missing}} is missing"));
        self::assertEquals('{{missing}} is {{still}} missing', $praise->say("{{missing}} is {{still}} missing"));
    }

    public function testMatchesCase()
    {
        self::assertEquals('You are Elegantly', Praise::praise('You are {{Adverb}}'));
        self::assertEquals('You are FORGING', Praise::praise('You are {{CREATING}}'));
        self::assertEquals('Ole, you are DEVISING smart B-)', Praise::praise('{{Exclamation}}, you are {{CREATING}} {{adjective}} {{smiley}}'));
    }
}