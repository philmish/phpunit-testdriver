<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver\Subscribers;

use Philmish\PhpunitTestdriver\Events\TestFailedEvent;
use PHPUnit\Event\Code\TestMethod;
use PHPUnit\Event\Test\Failed;
use PHPUnit\Event\Test\FailedSubscriber;


final class FailedNotifier implements FailedSubscriber {

    use SendJsonToStdout;

    private function sendEventData(TestMethod $test) {
        $eventData = new TestFailedEvent(
            $test->file(),
            $test->className(),
            $test->name(),
            $test->line(),
        );
        $this->sendToStdout($eventData->toArray());
    }
    
    public function notify(Failed $event): void {
        $test = $event->test();
        if ($test->isTestMethod()) {
            /**
             * @var TestMethod $test
             */
            $this->sendEventData($test);
        }
    }
}
