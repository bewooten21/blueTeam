<?php

$newPw= filter_input(INPUT_POST, 'pw');
$cNewPw= filter_input(INPUT_POST, 'cPw');

$login=true;
if($newPw===""){
    $error_message="Password Required";
    $login=false;
}else if($cNewPw===""){
    $error_message="Confirm Password";
    $login=false;
}else if( $newPw != $cNewPw){
    $error_message="Passwords must match";
    $login=false;
}

if($login===false){
    include('view/resetPw.php');
}else if($login===true){
    user_db::reset_pw($_SESSION['currentUser']->getUName(), $newPw);
    include('view/profile.php');
}

