<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver;

use PHPUnit\Framework\TestCase;
use Philmish\PhpunitTestdriver\Events\TestFailedEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(TestFailedEvent::class)]
#[Small]
final class TestFailedEventTest extends TestCase {

    public function testCanBeConvertedToArray():void {
        $notification = new TestFailedEvent("FileName", "ClassName", "TestName", 11);
        $expected = [
            "event" => "test.failed",
            "file" => "FileName", 
            "class" => "ClassName", 
            "name" => "TestName", 
            "line" => 11
        ];
        $this->assertEqualsCanonicalizing($expected, $notification->toArray());
    }
}
