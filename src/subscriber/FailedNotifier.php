<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver\Subscribers;

use PHPUnit\Event\Code\TestMethod;
use PHPUnit\Event\Test\Failed;
use PHPUnit\Event\Test\FailedSubscriber;


final class FailedNotifier implements FailedSubscriber {
    
    public function notify(Failed $event): void {
        $test = $event->test();
        if ($test->isTestMethod()) {
            /**
             * @var TestMethod $test
             */
            $notification = [
                "event" => "test.failed",
                "file" => $test->file(),
                "class" => $test->className(),
                "name" => $test->name(),
                "line" => $test->line(),
            ];
            $encoded = json_encode($notification);
            $encoded = $encoded . "\n";
            $out = fopen("php://stdout", "w");
            fputs($out, $encoded);
            fclose($out);
        }
    }
}
