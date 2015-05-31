<?php

namespace maniacalendar;

/**
 * ManiaCalendar API Exception
 */
class Exception extends \Exception {
    protected $httpcode;
    protected $httpstatus;
    
    /**
     * Make Exception
     * @param string $statusmessage
     * @param int $httpcode
     */
    public function __construct($statusmessage, $httpcode) {
        parent::__construct($statusmessage, $httpcode);
        
        $this->httpcode = $httpcode;
        $this->httpstatus = $statusmessage;
    }
    
    /**
     * Get HTTP error code
     * @return int
     */
    public function getHttpCode() {
        return $this->httpcode;
    }
}