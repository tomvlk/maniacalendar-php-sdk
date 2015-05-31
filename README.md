[![Build Status](https://travis-ci.org/tomvlk/maniacalendar-php-sdk.png)](https://travis-ci.org/tomvlk/maniacalendar-php-sdk)

# ManiaCalendar API SDK for PHP
ManiaCalendar API SDK for PHP language


## Installation
Use Composer to install and use the SDK.

```
    composer require 'tomvlk/maniacalendar-php-sdk:dev-master'
```

Alternative you can download and install manually too, but better be up-to-date with Composer, and it's easy too.

## API Key
To use the API, you have to get a API key.
It's easy, and fast, just get an API key here:

http://api.maniacalendar.com/doc/keys

## Usage
You can use most of the Methods that are available. Currently you can use:
- Get events (/events/)
- Get event detail (/event/[id])
- Get dates for events

To get started, look at the sample folder.

You can start with getting events with: 
```php
require 'vendor/autoload.php'; // Add the autoload file from Composer

$eventHandler = new maniacalendar\Event("API KEY HERE");

// This will return a array with the request results. The array will be false and throw an exception on failure.
// Array will contain objects when the request was successfully.
$events = $eventHandler->getEvents();

// Output the events array
var_dump($events);
```

## API Documentation
API Documentation is available on:
http://api.maniacalendar.com/doc/

## License
See LICENSE file.