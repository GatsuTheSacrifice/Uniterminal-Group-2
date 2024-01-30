<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Email = $_POST["Email"];
    $Pass = $_POST["Pass"];
    $RePass = $_POST["RePass"];
    
    try{    
        require_once "connection.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        //ERROR HANDLERS
        $errors = [];

        if(inputHandler($Email, $Pass)){
            $errors["empty_inputs"] = "Fill in All Fields!";
        }

        if(emailValidator($Email)){
            $errors["invalid_email"] = "Invalid Email Used!";
        }

        if(emailChecker($pdo, $Email)){
            $errors["used_email"] = "Email Already Used!";
        }

        if(retypePass($Pass, $RePass)){
            $errors["pass_not_match"] = "Password Do Not Match!";
        }

        require_once "session.inc.php";

        if($errors){
            $_SESSION["error_signup"] = $errors;

            header("Location: signup-form.php");
            die();
        }

       create_user($pdo, $Email, $Pass);
       header("Location: login.php?signup=success");
       $pdo = null;
       $stmt = null;
       die();

    } catch(PDOException $e) {
        die("QUERY FAILED!" . $e->getMessage());
    }
} else {
    header("Location: signup-form.php");
    die();
}
?>