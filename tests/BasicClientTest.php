<?php

class BasicClientTest extends PHPUnit_Framework_TestCase {
    
    public function testConnect() {
        $events = new \maniacalendar\Event("WRONG KEY");
        
        $foundError = false;
        $exception = null;
        try {
            $events->getEvents();
        } catch (Exception $ex) {
            $foundError = true;
            $exception = $ex;
        }
        $this->assertTrue($foundError, "Getting right responses. Api key is not defined, and that should give a exception");
        
        $this->assertEquals(403, $exception->getHttpCode());
    }
    
}