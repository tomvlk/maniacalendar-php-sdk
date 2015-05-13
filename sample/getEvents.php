<?php

require '../vendor/autoload.php';

$events = new \maniacalendar\Event("APICODE");

$result = $events->getEvents();

var_dump($result);
