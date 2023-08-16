<?php declare(strict_types=1);

namespace Philmish\PhpunitTestdriver\Events;

final class TestPassedEvent {
    private readonly string $event;
    private readonly string $file;
    private readonly string $class;
    private readonly string $name;
    private readonly int $line;
    
    public function __construct(string $file, string $class, string $name, int $line) {
        $this->event = "test.passed";
        $this->file = $file;
        $this->class = $class;
        $this->name = $name;
        $this->line = $line;
    }

    public function toArray(): array {
        return [
            "event" => $this->event,
            "file" => $this->file,
            "class" => $this->class,
            "name" => $this->name,
            "line" => $this->line,
        ];
        
    }
}


