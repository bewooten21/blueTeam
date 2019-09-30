<?php
class level {
    private $id, $arithmeticType, $digits;
    function __construct($id, $arithmeticType, $digits) {
        
        $this->id = $id;
        $this->arithmeticType = $arithmeticType;
        $this->digits = $digits;
    }
    
    function getId() {
        return $this->id;
    }

    function getArithmeticType() {
        return $this->fName;
    }

    function getDigits() {
        return $this->lName;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setArithmeticType($arithmeticType) {
        $this->fName = $fName;
    }

    function setDigits($digits) {
        $this->digits = $digits;
    }
    
}
?>