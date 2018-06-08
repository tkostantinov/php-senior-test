<?php

// Require composer's autoload
$loader = require __DIR__.'/../vendor/autoload.php';

$command = sprintf(
'php -S 127.0.0.1:1349 -t %s %s/url-id-generator.php  > /dev/null 2>&1 &',
    realpath(__DIR__ . '/../web/'),
    realpath(__DIR__ . '/../web/')
);

// Execute the command and store the process ID
$output = array();
exec($command, $output);
$pid = (int) $output[0];

var_dump($output);

echo sprintf(
'%s - Web server started on %s:%d with PID %d',
date('r'),
WEB_SERVER_HOST,
WEB_SERVER_PORT,
$pid
) . PHP_EOL;

// Kill the web server when the process ends
register_shutdown_function(function() use ($pid) {
echo sprintf('%s - Killing process with ID %d', date('r'), $pid) . PHP_EOL;
exec('kill ' . $pid);
});