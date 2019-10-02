<?php 
require_once 'model/database.php';
require_once 'model/user_db.php';
require_once 'model/user.php';
require_once 'model/level_db.php';
require_once 'model/level.php';
require_once 'model/question.php';

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
    
    case 'takeBaseline':
        
        $error_message='';
        $message='';
        include ('view/takeExam.php');
        die();
        break;
    
    case 'submitAnswer':
        
        
        
}
