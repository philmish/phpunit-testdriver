<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver\Subscribers;

trait SendJsonToStdout {
    function sendToStdout(array $eventData) {
        $encoded = json_encode($eventData);
        $encoded = $encoded . "\n";
        $out = fopen("php://stdout", "w");
        fputs($out, $encoded);
        fclose($out);
    }
}


