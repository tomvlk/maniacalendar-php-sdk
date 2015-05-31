<?php

namespace maniacalendar;

/**
 * Fetch Title filter items
 */
class Title extends Client {
    
    public function __construct($key) {
        parent::__construct($key);
    }
    
    /**
     * Get titles, used for filtering
     * 
     * @link http://api.maniacalendar.com/doc/titles Documentation API Page for titles.
     * 
     * @return array with title objects
     */
    public function getTitles() {
        return $this->execute('GET', 'titles');
    }
}