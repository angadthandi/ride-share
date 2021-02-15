<?php

class Driver {

    private int $id;
    private string $name;

    private static int $driverIncremntor = 0;

    public function __construct(string $name) {
        static::$driverIncremntor++;

        $this->id = static::$driverIncremntor;
        $this->name = $name;
    }

    public function getDriverID(): int {
        return $this->id;
    }

    public function getDriverName(): string {
        return $this->name;
    }

}