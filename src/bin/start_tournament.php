#!/usr/bin/php
<?php

include __DIR__ . "/../../autoload.php";

/**
 * Help
 */
function help()
{
    ?>
Usage: start_tournament.php [quantity knight (integer and odd number)]<?php
    exit(1);
}

/**
 * Stop
 *
 * @param null $message
 */
function stop($message = null)
{
    fwrite(STDERR, $message . "\n\n");

    help();
}

$args = $_SERVER['argv'];
array_shift($args);

try {
    $arena = \Tournament\Arena::createRandom($args[0]);
} catch (Exception | \Exceptions\OddNumberKnightsException $exception) {
    stop($exception->getMessage());
}

echo $arena->toString();
