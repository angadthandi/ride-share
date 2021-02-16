# Ride Share (OOD)

## Entities:

- RquestHandler
- RideType
- Passenger
- Driver
- Ride

## Classes:

### RideType
- Type STRING

### Passenger
- PassengerName STRING

### Driver
- DriverName STRING

### Ride
- ID INT
- RideType RIDETYPE
- Driver DRIVER
- Passenger PASSENGER

### RequestHandler
- DriverCount INT
- Passenger PASSENGER

--------------------------------------

From src/public folder start php local server -
./../../php/php.exe -S localhost:8080 -c ../../php/php.ini

--------------------------------------

### Test Ride

#### Notes

- we could return ride object from request handler
and get all info related to ride from that?
maybe request handler can return an interface of type ride.

- passenger could also have a status, if already in a ride
and be denied to create a new ride, if already in a ride.
same for driver.

##### Currently 1 ride per passenger
##### For allowing multiple rides per passenger

- Can add *allRides* array of Rides object in passenger class,
instead of currentRide.
- Create Ride should return Ride ID, so when cancelling/completing ride,
we pass in RideID & update accordingly.
- For cancelled rides, remove ride from *allRides*.