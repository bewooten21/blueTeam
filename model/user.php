<?php
/**
 * Description of user
 *
 * @author ts526610
 */
class user {
    private $id, $fName, $lName, $uName, $pWord, $level;
    function __construct($id, $fName, $lName, $uName, $pWord, $level) {
        
        $this->id = $id;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->uName = $uName;
        $this->pWord = $pWord;
        $this->level = $level;
    }
    
    function getId() {
        return $this->ID;
    }

    function getFName() {
        return $this->fName;
    }

    function getLName() {
        return $this->lName;
    }

    function getUName() {
        return $this->uName;
    }
    
    function getPWord() {
        return $this->pWord;
    }
    
     function getLevel() {
        return $this->level;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }
    
    function setUName($uName) {
        $this->uName = $uName;
    }
    
    function setPWord($pWord) {
        $this->pWord = $pWord;
    }
    
    function setLevel($level) {
        $this->level = $level;
    }
}
