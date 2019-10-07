<?php
require_once 'model/database.php';
require_once 'model/level_db.php';
require_once 'model/level.php';

class question {
    private $firstNumber, $secondNumber, $answer, $level, $correct;
    function __construct(level $level = null) {
        
        $this->level = $level ?: level(1,'addition',1);
        
        $this->createQuestion($level);
        
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
        if($level->getDigits() == 1){
               $min = 0;
               $max = 9; 
        }elseif($level->getDigits() == 2){
               $min = 10;
               $max = 99;
        }elseif($level->getDigits() == 3){
               $min = 100;
               $max = 999;
        }
       if($level->getArithmeticType() === 'division' || $level->getArithmeticType() === 'subtraction'){
           
           $this->setFirstNumber(rand($min,$max));
           $this->setSecondNumber(rand($min,$max));
           
           while($this->getSecondNumber() === 0 && $this->getFirstNumber() < $this->getSecondNumber()){               
               $this->setSecondNumber(rand($min,$max));
           }
           if($level->getArithmeticType() === 'division'){
               if($this->getFirstNumber()===0){
                   $this->setSecondNumber(5);
               }
               $this->setAnswer($this->getFirstNumber()/ $this->getSecondNumber()); 
           }else if($level->getArithmeticType() === 'subtraction'){
               $this->setAnswer($this->getFirstNumber() - $this->getSecondNumber());
           }
           
        }else{
            $this->setFirstNumber(rand($min,$max));
            $this->setSecondNumber(rand($min,$max));
            if($level->getArithmeticType() === 'addition'){
               $this->setAnswer($this->getFirstNumber() + $this->getSecondNumber()); 
           }else if($level->getArithmeticType() === 'multiplication'){
               $this->setAnswer($this->getFirstNumber() * $this->getSecondNumber());
           }
        }
    }
    
}
?>