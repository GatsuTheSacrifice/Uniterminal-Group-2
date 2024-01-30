<?php

declare(strict_types=1);

function inputHandler(String $Email, String $Pass){
    if(empty($Email) || empty($Pass)){
        return true;
    } else {
        return false;
    }
}

function is_email_wrong(bool|array $result){
  if(!$result){
        return true;
  } else {
        return false;
  }
}

function is_password_wrong(String $Pass, String $hashedpass){
    if(!password_verify($Pass, $hashedpass)){   
          return true;
    } else {
          return false;
    }
  }

?>