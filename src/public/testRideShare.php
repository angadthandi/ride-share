<?php

require_once __DIR__ . "/../modules/requesthandler/requesthandler.php";

$driver_1 = new Driver("Driver 1");
$driver_2 = new Driver("Driver 2");
$driversArr = [];
array_push($driversArr, $driver_1);
array_push($driversArr, $driver_2);
error_log(print_r($driversArr,true));

$passenger_1 = new Passenger("Passenger 1");
$passenger_2 = new Passenger("Passenger 2");
$passenger_3 = new Passenger("Passenger 3");
$passengersArr = [];
array_push($passengersArr, $passenger_1);
array_push($passengersArr, $passenger_2);
array_push($passengersArr, $passenger_3);
error_log(print_r($passengersArr,true));

$handler = new RequestHandler($driversArr, $passengersArr);

$origin_1 = 50;
$destination_1 = 100;
$numOfSeats_1 = 2;
// ride 1
$rideCreated_1 = $handler->createRide(
    $passenger_1->getPassengerID(),
    $driver_1->getDriverID(),
    $origin_1,
    $destination_1,
    $numOfSeats_1
);
if (!$rideCreated_1) {
    error_log(
        "unable to create ride for passenger: " .
        $passenger_1->getPassengerName()
    );
    return;
} else {
    error_log("ride created!");

    $handler->cancelRide($passenger_1->getPassengerID());
    error_log(
        "ride cancelled by passenger: " .
        $passenger_1->getPassengerName()
    );
}

// ride 2
$rideCreated_2 = $handler->createRide(
    $passenger_1->getPassengerID(),
    $driver_1->getDriverID(),
    $origin_1,
    $destination_1,
    $numOfSeats_1
);
if (!$rideCreated_2) {
    error_log(
        "unable to create ride for passenger: " .
        $passenger_1->getPassengerName()
    );
    return;
} else {
    error_log(
        "ride created for passenger: ".
        $passenger_1->getPassengerName()
    );

    $fare = $handler->completeRide($passenger_1->getPassengerID());
    error_log(
        "ride completed by passenger: " .
        $passenger_1->getPassengerName() .
        " from origin: ". $origin_1 .
        " to destination: ". $destination_1 .
        " with numOfSeats: ". $numOfSeats_1 .
        " and fare charged: " .
        $fare
    );
}

// ride 3
$rideCreated_3 = $handler->createRide(
    $passenger_1->getPassengerID(),
    $driver_1->getDriverID(),
    $origin_1,
    $destination_1,
    $numOfSeats_1
);
if (!$rideCreated_3) {
    error_log(
        "unable to create ride for passenger: " .
        $passenger_1->getPassengerName()
    );
    return;
} else {
    error_log(
        "ride created for passenger: ".
        $passenger_1->getPassengerName()
    );
}

// ride 4
$rideCreated_4 = $handler->createRide(
    $passenger_2->getPassengerID(),
    $driver_1->getDriverID(),
    $origin_1,
    $destination_1,
    $numOfSeats_1
);
if (!$rideCreated_4) {
    error_log(
        "unable to create ride for passenger: " .
        $passenger_2->getPassengerName()
    );
    return;
} else {
    error_log(
        "ride created for passenger: ".
        $passenger_2->getPassengerName()
    );
}

// ride 5
$rideCreated_5 = $handler->createRide(
    $passenger_3->getPassengerID(),
    $driver_1->getDriverID(),
    $origin_1,
    $destination_1,
    $numOfSeats_1
);
if (!$rideCreated_5) {
    error_log(
        "unable to create ride for passenger: " .
        $passenger_3->getPassengerName()
    );
    return;
} else {
    error_log(
        "ride created for passenger: ".
        $passenger_3->getPassengerName()
    );
}