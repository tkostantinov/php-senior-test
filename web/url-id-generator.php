<?php

include __DIR__ . '/../vendor/autoload.php';

$url = $_GET['q'] ?: '';


if ('' !== $url) {
    $generator = new Searchmetrics\SeniorTest\Network\OtherUrlIdGenerator();

    $generatorService = new Searchmetrics\SeniorTest\Service\Generator($generator);

    $response = [
        'status' => 200,
        'message' => 'OK',
        'data' => $generator->generate($url)
    ];
} else {
    $response = [
        'status' => 404,
        'message' => 'Url not found',
        'data' => ''
    ];
}

echo json_encode($response);
exit;