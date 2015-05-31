<?php

class BasicClientTest extends PHPUnit_Framework_TestCase {
    
    public function testConnect() {
        $this->assertTrue(isset($_ENV['APIKEY']), "Api Key for Travis");
        $events = new maniacalendar\Event($_ENV['APIKEY']);
        
        $this->assertTrue(count($events->getEvents()) > 0, "Getting right responses.");
    }
    
}