<?php
$qAnswers=[];
$questions = $_SESSION['baselineExam'];

foreach($_SESSION['baselineExam']->getQuestions() as $q){
    $qAnswer=$q->getAnswer();
    array_push($qAnswers, $qAnswer);
}

var_dump($qAnswers);
 



