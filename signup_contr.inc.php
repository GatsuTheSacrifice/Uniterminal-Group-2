<?php

declare(strict_types=1);

function inputHandler(String $Email, String $Pass){
    if(empty($Email) || empty($Pass)){
        return true;
    } else {
        return false;
    }
}

function emailValidator(String $Email){
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function emailChecker(Object $pdo, String $Email){
    if(getEmail($pdo, $Email)) {
        return true;
    } else{
        return false;
    }
}

function retypePass(String $Pass, String $RePass){
    if($Pass !== $RePass){
        return true;
    } else{
        return false;
    }
}

function create_user(Object $pdo, String $Email, String $Pass){
   set_user($pdo, $Email, $Pass);
}


?>