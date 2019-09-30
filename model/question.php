<?php
class question {
    private $firstNumber, $secondNumber, $answer, $level, $correct;
    function __construct($firstNumber, $secondNumber, $answer, $level, $correct) {
        
        $this->firstNumber = $firsNumber;
        $this->secondNumber = $secondNumber;
        $this->answer = $answer;
        $this->pWord = $level;
        $this->level = $correct;
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
}
?>