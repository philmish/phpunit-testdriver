<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver\Subscribers;

use Philmish\PhpunitTestdriver\Events\TestPassedEvent;
use PHPUnit\Event\Code\TestMethod;
use PHPUnit\Event\Test\Passed;
use PHPUnit\Event\Test\PassedSubscriber;

final class PassedNotifier implements PassedSubscriber {

    use SendJsonToStdout;

    private function sendEventData(TestMethod $test) {
        $eventData = new TestPassedEvent(
            $test->file(),
            $test->className(),
            $test->name(),
            $test->line(),
        );
        $this->sendToStdout($eventData->toArray());
    }
    
    public function notify(Passed $event): void {
       $test = $event->test(); 
        if ($test->isTestMethod()) {
            /**
             * @var TestMethod $test
             */
            $this->sendEventData($test);
        }
    }
}


