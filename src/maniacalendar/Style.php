<?php

namespace maniacalendar;

/**
 * Fetch Style filter items
 */
class Style extends Client {
    
    public function __construct($key) {
        parent::__construct($key);
    }
    
    /**
     * Get styles. Can be for one specific title or all when leaving $title null
     * 
     * @link http://api.maniacalendar.com/doc/styles Documentation API Method
     * @param string $title Filter styles on titleid, leave NULL for all styles.
     * @return array Array with styles.
     */
    public function getStyles($title = null) {
        return $this->execute('GET', 'styles', array("title" => $title));
    }
}