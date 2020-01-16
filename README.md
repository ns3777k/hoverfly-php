# Hoverfly PHP Client

[![Build Status](https://travis-ci.org/ns3777k/hoverfly-php.svg?branch=master)](https://travis-ci.org/ns3777k/hoverfly-php)
[![codecov](https://codecov.io/gh/ns3777k/hoverfly-php/branch/master/graph/badge.svg)](https://codecov.io/gh/ns3777k/hoverfly-php)

PHP Client for [hoverfly](https://hoverfly.io/) based on [java version](https://github.com/SpectoLabs/hoverfly-java).

## Why I would use it for?

Consider having a functional test that sends a request to the application. While handling the request application can
use multiple external services like forecast, billing or booking system. We don't wanna test external services because
they are not stable, require an internet connection, can limit request rate per second and add delay. During the test we
just want **something** to respond to our requests according to the specification, it does not have to be a real service
and that's where hoverfly and this client come in.

## Installation

```shell script
$ composer require ns3777k/hoverfly
```

## Example

Your tests have to be configured to use hoverfly proxy server (use `HTTP_PROXY`) and ignore proxy for itself (use
`NO_PROXY`).

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Hoverfly\Client;
use Hoverfly\Model\Response;

class SomeTest
{
    private $hoverfly;

    public function _before()
    {
        $this->hoverfly = new Client(['base_uri' => getenv('HOVERFLY_URL')]);
        $this->hoverfly->deleteSimulation();
    }

    public function testFeature(ApiTester $I)
    {
        $this->hoverfly->simulate(
            $this->hoverfly->buildSimulation()
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

        $I->sendPOST('/api/v1/faq/9999999/dislike', ['comment' => 'test']);
    }
}
```

## Coming soon
1. Journal API
2. Verify method
3. Write tests
