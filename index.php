<?php 

$userName = '';
$password = '';

$action= filter_input(INPUT_POST, 'action');
if($action=== null){
    $action = filter_input(INPUT_GET, 'action');
    if($action === null){
        $action = 'home';
    }
}
        

switch ($action){
    case 'home':
        include('view/home.php');
        die();
        break;
    case 'login':
        include('view/login.php');
        die();
        break;
    
    case 'loggedin':
        $userName = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        include('view/profile.php');
        die();
        break;
}
