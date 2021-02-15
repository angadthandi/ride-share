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
./../php/php.exe -S localhost:8080 -c ../php/php.ini

--------------------------------------

### Test Ride