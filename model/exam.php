<?php
include_once 'model/question.php';
require_once 'model/level.php';
require_once 'model/level_db.php';

class exam {
    private $questions = [],$time,$level,$questionQuantity;
    
    function __construct($questionQuantity = null, level $level = null, $time = null) {
        $this->questionQuantity = $questionQuantity;
        $this->level= $level;
        $this->time = $time;
        $this->questions;
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

    function setQLevel(level $level) {
        $this->level = $level;
    }
    
    function getTime() {
        return $this->time;
    }

    function setTime($time) {
        $this->time = $time;
    }
   
    function getQuestionQuantity() {
        return $this->questionQuantity;
    }

    function setQuestionQuantity($questionQuantity) {
        $this->questionQuantity = $questionQuantity;
    }
    
    function createBaselineExam(){
        $levels  = level_db::select_all();
        
        if(! isset($this->questionQuantity)){
            $qLevelID = 1;
            
            
            for($qLevelID; $qLevelID <= 11; $qLevelID++){
                $count = 0;
                $qLevel = $levels[$qLevelID];
                while($count <5){
                    $question = new question($qLevel);
                    array_push($this->questions, $question);
                    $count++;
                }
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
    
    function createPracticeDrill(){
        if(isset($this->questionQuantity) && $this->questionQuantity != null){
            $count = 0;
            while($count < $this->questionQuantity){
                $question = new question($level);
                array_push($this->questions, $question);
                $count++;
            }
        }
        else{
            $count = 0;
            while($count < 5){
                $question = new question($this->level);
                array_push($this->questions, $question);
                $count++;
            }
        }
    }
}
