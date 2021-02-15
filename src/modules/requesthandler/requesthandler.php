<?php

require_once __DIR__ "/../ridestatus/ridestatus.php";
require_once __DIR__ "/../driver/driver.php";
require_once __DIR__ "/../passenger/passenger.php";
require_once __DIR__ "/../ride/ride.php";

class RequestHandler {

    private int $driverCount;
    private array $drivers; // Driver[]
    private array $passengers; // Passenger[]

    public function __construct(array $drivers, array $passengers) {
        $this->driverCount = count($drivers);
        $this->drivers = $drivers;
        $this->passengers = $passengers;
    }

    public function createRide(
        int $passengerID,
        int $driverID,
        int $origin,
        int $destination,
        int $numOfSeats
    ): void {
        // driver available
        if ($this->driverCount <= 0) {
            error_log("no drivers available");
            return;
        }

        // find driver
        $currDriver = $this->_getCurrentDriver($driverID);
        if (empty($currDriver)) { return; }

        // find passenger
        $currPassenger = $this->_getCurrentPassenger($passengerID);
        if (empty($currPassenger)) { return; }

        $this->driverCount -= 1;

        $currPassenger->createRide($origin, $destination, $numOfSeats);
    }

    public function completeRide(int $passengerID): int {
        // find passenger
        $currPassenger = $this->_getCurrentPassenger($passengerID);
        if (empty($currPassenger)) { return; }

        $this->driverCount += 1;

        // return fare
        return $currPassenger->completeRide();
    }

    public function cancelRide(int $passengerID): void {
        // find passenger
        $currPassenger = $this->_getCurrentPassenger($passengerID);
        if (empty($currPassenger)) { return; }

        $this->driverCount += 1;

        $currPassenger->cancelRide();
    }

    // Private methods -----------------------------------------------

    private function _getCurrentDriver(Driver $driverID): Driver {
        $currDriver = null;

        foreach ($drivers as $driver) {
            if ($driver->getDriverID() == $driverID) {
                $currDriver = $driver;
                break;
            }
        }
        if (empty($currDriver)) {
            error_log("driver not found for id: " . $driverID);
            return;
        }

        return $currDriver;
    }

    private function _getCurrentPassenger(Passenger $passengerID): Passenger {
        $currPassenger = null;

        foreach ($passengers as $passenger) {
            if ($passenger->getPassengerID() == $passengerID) {
                $currPassenger = $passenger;
                break;
            }
        }
        if (empty($currPassenger)) {
            error_log("passenger not found for id: " . $passengerID);
            return;
        }

        return $currPassenger;
    }

}