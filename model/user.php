<?php
/**
 * Description of user
 *
 * @author ts526610
 */
class user {
    private $ID, $fName, $lName, $pWord;
    function __construct($ID, $fName, $lName, $pWord) {
        
        $this->ID = $ID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->pWord = $pWord;
        
    }
    
    function getID() {
        return $this->ID;
    }

    function getFName() {
        return $this->fName;
    }

    function getLName() {
        return $this->lName;
    }

    function getPWord($pWord) {
        $this->pWord = $pWord;
    }
    
    function setID($ID) {
        $this->ID = $ID;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }
    
    function setPWord($pWord) {
        $this->pWord = $pWord;
    }
    
}
