<?php

require '../vendor/autoload.php';

$events = new \maniacalendar\Event("apikey");

$result = $events->getEvents();

var_dump($result);
