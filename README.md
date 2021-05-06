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

Extends Enum class.

```php
<?php

/**
 * Class MyEnum
 *
 * @author Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class MyEnum extends Enum {

    public const VALUE1 = 1;
    public const VALUE2 = 2;
    public const VALUE3 = 3;
}


$enum = new MyEnum(3);

// Dynamic static methods available
$enum::VALUE3();    // new MyEnum(3)
$enum::VALUE1();    // new MyEnum(1)
$enum::VALUE2();    // new MyEnum(2)
```

```php

public function edit(MyEnum $enum){
    //...
}

$object->edit(MyEnum::VALUE1());
```

```php
$enum->getValue();  // int(3)
```
```php
$enum->getValue();  // int(3)
```
```php
$enum->getKey();    // "VALUE3"
```

### getValues();
```php
$enum->getValues();
```
Output:
```bash
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
```

### getKeys()

```php
$enum->getKeys();
```
Output:
```bash
array(3) {
  [0]=>
  string(6) "VALUE1"
  [1]=>
  string(6) "VALUE2"
  [2]=>
  string(6) "VALUE3"
}
```
### toArray();
```php
$enum->toArray();
```
Output:
```bash
array(3) {
  ["VALUE1"]=>
  int(1)
  ["VALUE2"]=>
  int(2)
  ["VALUE3"]=>
  int(3)
}
```
### Cast string
```php
(string) MyEnum::VALUE1();   // "1"
(string) new MyEnum(3);      // "3"
(string) new MyEnum( MyEnum::VALUE1() );  // "1"
```

