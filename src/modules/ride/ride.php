<?php

require_once __DIR__ . "/../ridestatus/ridestatus.php";

class Ride {

    private const AMOUNT_PER_KM = 20;

    private int $id;
    private int $rideStatus;
    private int $origin;
    private int $destination;
    private int $numOfSeats;
    private int $fare;

    private static int $rideIncremntor = 0;

    public function __construct() {
        static::$rideIncremntor++;
        $this->id = static::$rideIncremntor;

        $this->rideStatus = Ridestatus::CREATED;
    }

    public function getRideID(): int {
        return $this->id;
    }

    public function getRideStatus(): int {
        return $this->rideStatus;
    }

    public function setRideStatus(int $rideStatus): void {
        $this->rideStatus = $rideStatus;
    }

    public function setNumOfSeats(int $numOfSeats): void {
        $this->numOfSeats = $numOfSeats;
    }

    public function setOrigin(int $origin): void {
        $this->origin = $origin;
    }

    public function setDestination(int $destination): void {
        $this->destination = $destination;
    }

    public function calculateFare(): int {
        $this->fare = (
                ($this->destination - $this->origin) * $this->numOfSeats
            ) * static::AMOUNT_PER_KM;
        return $this->fare;
    }

}