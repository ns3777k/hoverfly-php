# Hoverfly PHP Client

[![Build Status](https://travis-ci.org/ns3777k/hoverfly-php.svg?branch=master)](https://travis-ci.org/ns3777k/hoverfly-php)
[![codecov](https://codecov.io/gh/ns3777k/hoverfly-php/branch/master/graph/badge.svg)](https://codecov.io/gh/ns3777k/hoverfly-php)

PHP Client for [hoverfly](https://hoverfly.io/) based on [java version](https://github.com/SpectoLabs/hoverfly-java).

***Project is under heavy development! API may change in future!***

## Installation

```shell script
$ composer require ns3777k/hoverfly
```

## Example

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Hoverfly\Client;
use Hoverfly\Model\Response;

$client = new Client();
$client->simulate(
    $client->buildSimulation()
        ->serviceExact('test.ru')
        ->getExact('/test')
        ->withState('customer', 'individual')
        ->willReturn(
            Response::json(['test' => true])
                ->setDelay(3000)
                ->addTransitionsState('step', 'order')
                ->addTransitionsState('customer', 'individual')
                ->addRemovesState('basket')
        )
);
```

## TODO: Basic
1. Write tests

## TODO: Advanced
1. Implement the rest of API
2. Implement phpunit integration?
3. Implement codeception integration?
