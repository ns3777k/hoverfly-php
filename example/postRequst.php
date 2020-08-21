<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Hoverfly\Client;
use Hoverfly\Model\Response;

$hoverfly = new Client(['base_uri' => 'http://localhost:8888']);
$hoverfly->simulate(
    $hoverfly->buildSimulation()
        ->serviceExact('test.ru')
        ->postExact('/api/v1/faq/9999999/dislike')
        ->bodyExact('comment=test')
        ->willReturn(
            Response::json(['test' => true])
                ->setDelay(1000)
        )
);

$ch = curl_init('http://test.ru/api/v1/faq/9999999/dislike');
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_PROXY => 'http://localhost:8500',
    CURLOPT_POSTFIELDS => 'comment=test',
    CURLOPT_RETURNTRANSFER => true,
]);

$result = curl_exec($ch);
curl_close($ch);

var_dump(json_decode($result, true));
