<?php

class BasicClientTest extends PHPUnit_Framework_TestCase {
    
    public function testConnect() {
        $key = file_get_contents("../testkey.txt");
        $key = trim($key);
        
        $events = new maniacalendar\Event($key);
        
        $this->assertTrue(count($events->getEvents()) > 0, "Getting right responses.");
    }
    
}