# PHP Enum object

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tleckie/enum.svg?style=flat-square)](https://packagist.org/packages/tleckie/enum)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/teodoroleckie/enum/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/teodoroleckie/enum/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/teodoroleckie/enum/badges/build.png?b=main)](https://scrutinizer-ci.com/g/teodoroleckie/enum/build-status/main)
[![Total Downloads](https://img.shields.io/packagist/dt/tleckie/enum.svg?style=flat-square)](https://packagist.org/packages/tleckie/enum)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/teodoroleckie/enum/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)

Enumerator in php

### Installation

You can install the package via composer:

```bash
composer require tleckie/enum
```

### Usage

Extends Enum class and create your own type.

```php
<?php

/**
 * Class Vehicle
 *
 * @method static Vehicle CAR()
 * @method static Vehicle MOTORCYCLE()
 * @method static Vehicle BIKE()
 * @method static Vehicle TRICYCLE()
 * 
 * @author Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class Vehicle extends Enum 
{
    public const CAR = 1;
    public const MOTORCYCLE = 2;
    public const BIKE = 3;
    public const TRICYCLE = 4;
}

$vehicle = new Vehicle(3);

// Dynamic static methods available
$vehicle::CAR();           // new Vehicle(1)
$vehicle::MOTORCYCLE();    // new Vehicle(2)
$vehicle::BIKE();          // new Vehicle(3)
$vehicle::TRICYCLE();      // new Vehicle(4)
.
.
.
Vehicle::CAR();           // new Vehicle(1)
Vehicle::MOTORCYCLE();    // new Vehicle(2)
Vehicle::BIKE();          // new Vehicle(3)
Vehicle::TRICYCLE();      // new Vehicle(4)
```

```php

public function edit(Vehicle $vehicle){
    //...
}

$object->edit(Vehicle::CAR());

```

```php
$vehicle = new Vehicle(3);

$vehicle->getValue();  // int(3)
$vehicle->getKey();    // "BIKE"
```

### getValues():
```php
$vehicle = new Vehicle(3);
$vehicle->getValues(); // [1,2,3,4]
```

### getKeys():
```php
$vehicle = new Vehicle(3);
$vehicle->getKeys();    //["CAR","MOTORCYCLE","BIKE","TRICYCLE"]
```

### toArray():

```php
$vehicle = new Vehicle(3);
$vehicle->toArray();   //["CAR" => 1,"MOTORCYCLE" => 2,"BIKE" => 3,"TRICYCLE" => 4]
```

### Cast string
```php
(string) Vehicle::MOTORCYCLE();             // "2"
(string) new Vehicle(3);                    // "3"
(string) new Vehicle( Vehicle::TRICYCLE() );// "4"
(string) new Vehicle( new Vehicle(1) );     // "1"
```
