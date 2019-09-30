<?php
class exam {
    private $questions,$level,$time;
    
    function __construct($questions, $level, $time) {
        $this->questoions = $questions;
        $this->level= $level;
        $this->time = $time;
    }
    
    function getQuestions() {
        return $this->questions;
    }

    function setQuestions($questions) {
        $this->questions = $questions;
    }
        
    function getLevel() {
        return $this->level;
    }

    function setQLevel($level) {
        $this->level = $$level;
    }
    
    function getTime() {
        return $this->time;
    }

    function setTime($time) {
        $this->time = $$time;
    }
}
