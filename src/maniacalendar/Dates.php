<?php

namespace maniacalendar;

class Dates extends Client {
    
    public function __construct($key) {
        parent::__construct($key);
    }
    
    /**
     * Get dates for an event
     * 
     * @link http://api.maniacalendar.com/doc/dates Documentation for API method.
     * @param int $eventid Give the EventID
     * @param int $from Get from UTC Timestamp, default (null) is today 00:00.
     * @param int $limit Limit the dates, default (null) is 50.
     * @param boolean $ids Also show Date IDs. Can be usefull when editing.
     * @return array Array with objects.
     */
    public function getDates($eventid, $from = null, $limit = 50, $ids = false) {
        return $this->execute('GET', 'dates/' . intval($eventid), array('from' => $from, 'limit' => $limit, 'ids' => $ids));
    }
}