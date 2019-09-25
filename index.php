<?php 
$action= filter_input(INPUT_POST, 'action');
if($action=== null){
    $action = filter_input(INPUT_GET, 'action');
    if($action === null){
        $action = 'home';
    }
}
        

switch ($action){
    case 'home':
        include('home.php');
        die();
        break;
    case 'login':
        include('login.php');
        die();
        break;
}
?>
