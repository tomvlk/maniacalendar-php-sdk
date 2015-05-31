<?php

namespace maniacalendar;

class Event extends Client {
    
    public function __construct($key) {
        parent::__construct($key);
    }
    
    /**
     * Get events from API,
     * 
     * @link http://api.maniacalendar.com/doc/event Documentation for API method.
     * @param string $game can be either 'trackmania' or 'shootmania'. Null for both.
     * @param int $style Give the unique id for filtering on style.
     * @param string $title Give a titleid (string) for filtering on title. default null, no filtering on title.
     * @param int $start Filter on events with dates from this UTC Timestamp, default today at 00:00.
     * @param int $end Filter on events with dates ending before UTC Timestamp, default none (null).
     * @param type $limit Limit the results, default 20.
     * @param type $offset Start from an offset (use when filtering and want pages)
     * @return array Array with objects.
     */
    public function getEvents($game = null, $style = null, $title = null, $start = null, $end = null, $limit = 20, $offset = 0) {
        return $this->execute('GET', 'events', ['game' => $game, 'style' => $style, 'title' => $title, 'start' => $start, 'end' => $end, 'limit' => $limit, 'offset' => $offset]);
    }
    
    /**
     * Get details for one event.
     * 
     * @link http://api.maniacalendar.com/doc/event Documentation for API method.
     * @param int $eventid Give the EventID.
     * @return object
     */
    public function getEventDetails($eventid) {
        return $this->execute('GET', 'events/' . intval($eventid));
    }
}