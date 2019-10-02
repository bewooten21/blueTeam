<?php
include_once 'model/question.php';
require_once 'model/level.php';

class exam {
    private $questions = [],$level,$time,$questionQuantity;
    
    function __construct($questionQuantity = null, $level = null, $time = null) {
        $this->questionQuantity = $questionQuantity;
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
    
 function createBaselineExam(){
        if(!isset($this->questionQuantity)){
            $qLevel = 1;
            $count = 0;
            while($qLevel <= 11){
                while($count <5){;
                    $question = new question($qLevel);
                    array_push($this->questions, $question);
                    $count++;
                }
                $qLevel++;
            }
        }
        else{
            $qLevel = 1;
            $count = 0;
            while($qLevel <= 11){
                while($count < $this->questionQuantity){;
                    $question = new question($qLevel);
                    array_push($this->questions, $question);
                    $count++;
                }
                $qLevel++;
            }
        }
    }
    
    public static function createPracticeDrill(){
        while($count < $this->questionQuantity){
                $question = new question($this->level);
                array_push($this->questions, $question);
                $count++;
            }
    }
}
