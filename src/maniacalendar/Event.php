<?php

namespace maniacalendar;

class Event extends Client {
    
    public function __construct($key) {
        parent::__construct($key);
    }
    
    public function getEvents($game = null, $style = null, $title = null, $start = null, $end = null, $limit = 20, $offset = 0) {
        return $this->execute('GET', 'events', ['game' => $game, 'style' => $style, 'title' => $title, 'start' => $start, 'end' => $end, 'limit' => $limit, 'offset' => $offset]);
    }
}