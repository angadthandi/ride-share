<?php

class RideStatus {

    public const IDLE = 0;
    public const CREATED = 1;
    public const COMPLETED = 2;
    public const CANCELLED = 3;

    public function __construct() {}

    public static function getStatusByID(int $id): int {
        switch ($id) {
            case 0:
                return self::IDLE;
            case 1:
                return self::CREATED;
            case 2:
                return self::COMPLETED;
            case 3:
                return self::CANCELLED;
        }
    }

}