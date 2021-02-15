<?php

require_once __DIR__ "/../ride/ride.php";
require_once __DIR__ "/../ridestatus/ridestatus.php";

class Passenger {

    private int $id;
    private string $name;
    private Ride $currentRide;

    private static int $passengerIncremntor = 0;

    public function __construct(string $name) {
        static::$passengerIncremntor++;

        $this->id = static::$passengerIncremntor;
        $this->name = $name;
    }

    public function getPassengerID(): int {
        return $this->id;
    }

    public function getPassengerName(): string {
        return $this->name;
    }

    public function createRide(
        int $origin,
        int $destination,
        int $numOfSeats
    ): void {
        $this->currentRide = new Ride();

        $this->currentRide->setOrigin($origin);
        $this->currentRide->setDestination($destination);
        $this->currentRide->setNumOfSeats($numOfSeats);
    }

    // return fare
    public function completeRide(): int {
        $this->currentRide->setRideStatus(Ridestatus::COMPLETED);

        return $this->currentRide->calculateFare();
    }

    public function cancelRide(): void {
        $this->currentRide->setRideStatus(Ridestatus::CANCELLED);
    }

}