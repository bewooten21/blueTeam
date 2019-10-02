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
        return $this->arithmeticType;
    }

    function getDigits() {
        return $this->digits;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setArithmeticType($arithmeticType) {
        $this->arithmeticType = $arithmeticType;
    }

    function setDigits($digits) {
        $this->digits = $digits;
    }
    
}
?>