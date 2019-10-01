<?php
include_once 'model/question';
class exam {
    private $questions = [],$level,$time,$questionQuantity;
    
    function __construct($questionQuantity, $level, $time) {
        $this->questoionQuantity = $questionQuantity;
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
    
    function getQuestionQuantity() {
        return $this->questionQuantity;
    }

    function setQuestionQuantity($questionQuantity) {
        $this->questionQuantity = $questionQuantity;
    }
    
    public static function createExam($lvl){
        if($lvl === "m"){
            $levels = 1;
            $count = 0;
            while(level <= 11){
                while($count <5){;
                    $question = new question();
                    $questions[$questions.length] = $newQuestion;
                    $count++;
                }
                $levels++;
            }
        }
        else{
            while($count < $this->questionQuantity){
                $question = new question($this->level);
                $questions[$questions.length] = $newQuestion;
                $count++;
            }
        }
    }
}
