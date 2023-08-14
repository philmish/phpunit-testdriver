<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver;

use PHPUnit\Runner\Extension\Extension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

use Philmish\PhpunitTestdriver\Subscribers\FailedNotifier;
use Philmish\PhpunitTestdriver\Subscribers\PassedNotifier;

final class TestdriverExtension implements Extension  {
    
    public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void {
        $facade->registerSubscribers(
            new PassedNotifier(),
            new FailedNotifier(),
        );
    }
}

