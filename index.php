<?php 
require_once 'model/database.php';
require_once 'model/user_db.php';
require_once 'model/user.php';
require_once 'model/level_db.php';
require_once 'model/level.php';
require_once 'model/question.php';
require_once 'model/exam.php';

$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

$userName = '';
$password = '';

$action= filter_input(INPUT_POST, 'action');
if($action=== null){
    $action = filter_input(INPUT_GET, 'action');
    if($action === null){
        $action = 'viewLogin';
    }
}
        

switch ($action){
    case 'home':
        include('view/home.php');
        die();
        break;
    
    case 'viewLogin';
        $message = '';
        
        if (!isset($uName)) {
            $uName = '';
        }
        $pWord = '';
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['uName'] = '';
            $error_message['pWord'] = '';
        }

        include 'view/login.php';
        die();
        break;

    case 'loggingIn';     
        $uName = filter_input(INPUT_POST, 'uName');
        $pWord = filter_input(INPUT_POST, 'pWord');
        $checkUserName = user_db::get_user_by_username($uName);
        $message = '';

        if ($checkUserName != FALSE) {
            $theUser = user_db::validate_user_login($uName);

            if ($pWord === $theUser->getPWord()) {
                $pwMessage="";
                $_SESSION['currentUser'] = $theUser;
                
                include 'view/profile.php';
            } else {
                $error_message['uName'] = '';
                $error_message['pWord'] = 'Wrong password';
                include 'view/login.php';
            }
        } else {
            $error_message['uName'] = 'No User By That Name';
            $error_message['pWord'] = '';
            include 'view/login.php';
        }
        
        die();
        break;
        
    case 'logout':
        session_destroy();

        $message = "You have successfully logged out!";
        
        if (!isset($uName)) {
            $uName = '';
        }
        $pWord = '';
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['uName'] = '';
            $error_message['pWord'] = '';
        }

        include 'view/login.php';
        die();
        break;
        
    case 'resetPw':
        
        $error_message="";
       
        include('view/resetPw.php');
        die();
        break;
    case 'resetPwVal':
        
        include 'model/resetPwVal.php';
        die();
        break;
    
    case 'viewProfile':
        include 'view/profile.php';
        die();
        break;
    
    case 'takeBaseline':
        $baselineExam = new exam();
        
        $baselineExam->createBaselineExam();
        
        $_SESSION['baselineExam'] = $baselineExam;
        
        $error_message='';
        $message='';
        include ('view/takeExam.php');
        die();
        break;
    
    case 'submitAnswer':
        $answersTemp= filter_input_array(INPUT_POST);
        $answers = $answersTemp['answer'];
        $incorrectAnswers = [];
        $questionIncorrect = [];
        $countIncorrect = 0; 
        $studentLevel = 11;
        $countTotal = 0;
        
        for ($x = 54; $x >= 0; $x--){
            if(isset($answers[$x]) && $answers[$x] == $_SESSION['baselineExam']->getQuestions()[$x]->getAnswer()){
                $_SESSION['baselineExam']->getQuestions()[$x]->setCorrect(TRUE); 
            }else{
                array_push($incorrectAnswers, $answers[$x]);
                array_push($questionIncorrect, $_SESSION['baselineExam']->getQuestions()[$x]);
                $countIncorrect++;
                $_SESSION['baselineExam']->getQuestions()[$x]->setCorrect(FALSE);
                
                if($_SESSION['baselineExam']->getQuestions()[$x]->getLevel()->getId() < $studentLevel){
                    $studentLevel = $_SESSION['baselineExam']->getQuestions()[$x]->getLevel()->getId();
                }
            }
            $countTotal++;
        }
        
        $_SESSION['incorrectAnswers'] = $answers;
        $_SESSION['incorrectQuestions'] = $questionIncorrect;
        $_SESSION['numIncorrect'] = $countIncorrect;
        $_SESSION['percentage'] = $countIncorrect/$countTotal;
        $_SESSION['currentUser']->setLevel($studentLevel);
//        user_db::update_user_level($_SESSION['currentUser']->getId(), $studentLevel);
        include('view/baselineResults.php');
        
//        for ($x = 1; $x <= 55; $x++){
//            $answer= filter_input(INPUT_POST, 'answer'.$x);
//            array_push($answers, $answer);
//        }
//        $_SESSION['answers']=$answers;
//        include('model/valAnswers.php');
        
        die();
        break;
    case 'takeDrill':
        $drill = new exam();
        $user = $_SESSION['currentUser'];
        $drill->setQLevel(level_db::get_level_by_id($user->getLevel()));
        $drill->createPracticeDrill();
        $_SESSION['drill'] = $drill;
        $error_message = '';
        $message = '';
        include('view/takeDrill.php');
        
        die();
        break;
        
        
}
