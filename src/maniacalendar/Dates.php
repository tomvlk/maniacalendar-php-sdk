<?php

namespace maniacalendar;

class Dates extends Client {
    
    public function __construct($key) {
        parent::__construct($key);
    }
    
    public function getDates($eventid, $from = null, $limit = 50, $ids = false) {
        return $this->execute('GET', 'dates/' . intval($eventid), array('from' => $from, 'limit' => $limit, 'ids' => $ids));
    }
}