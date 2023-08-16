<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver;

use PHPUnit\Framework\TestCase;
use Philmish\PhpunitTestdriver\Events\TestPassedEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(TestPassedEvent::class)]
#[Small]
final class TestPassedEventTest extends TestCase {

    public function testCanBeConvertedToArray():void {
        $notification = new TestPassedEvent("FileName", "ClassName", "TestName", 11);
        $expected = [
            "event" => "test.passed",
            "file" => "FileName", 
            "class" => "ClassName", 
            "name" => "TestName", 
            "line" => 11
        ];
        $this->assertEqualsCanonicalizing($expected, $notification->toArray());
    }
}


