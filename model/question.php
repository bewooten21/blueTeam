<?php
require_once 'model/database.php';
require_once 'model/level_db.php';
require_once 'model/level.php';

class question {
    private $firstNumber, $secondNumber, $answer, $level, $correct;
    function __construct(level $level = null) {
        
        $this->level = $level ?: level(1,'addition',1);
        
        createQuestion($level);
        
    }
    

    function getFirstNumber() {
        return $this->firstNumber;
    }

    function getSecondNumber() {
        return $this->secondNumber;
    }

    function getAnswer() {
        return $this->answer;
    }
    
    function getLevel() {
        return $this->level;
    }
    
     function getCorrect() {
        return $this->correct;
    }
    

    function setFirstNumber($firstNumber) {
        $this->firstNumber = $firstNumber;
    }

    function setSecondNumber($secondNumber) {
        $this->secondNumber = $secondNumber;
    }
    
    function setAnswer($answer) {
        $this->answer = $answer;
    }
    
    function setLevel($level) {
        $this->level = $level;
    }
    
    function setCorrect($correct) {
        $this->correct = $correct;
    }
    
    function createQuestion($level){
        $max;
        $min;
       if($level->getArithmeticType() !== 'division'){
           if($level->getDigits() === 1){
               $min = 0;
               $max = 9;
               $this->setFirstNumber(rand($min,$max));
               $this->setSecondNumber(rand($min,$max));
               
               
           }elseif($level->getDigits() === 2){
               
           }elseif($level->getDigits() === 3){
           
           }
        }else{
            
        }
    }
    
}
?>