<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Email = $_POST["Email"];
    $Pass = $_POST["Pass"];
 
    try {
       require_once 'connection.inc.php';
       require_once 'login_model.inc.php';
       require_once 'login_contr.inc.php';
        
       $errors = [];

       if(inputHandler($Email, $Pass)){
        $errors["empty_inputs"] = "Fill in All Fields!";
    }
    $result = user_get($pdo, $Email);

    if(is_email_wrong($result)){
        $errors["login_incorrect"] = "Incorrect Login Info!";
    }

    if(!is_email_wrong($result) && is_password_wrong($Pass, $result["Pass"])){
        $errors["login_incorrect"] = "Incorrect Login Info!";
    }

       require_once 'session.inc.php';

    if($errors){
        $_SESSION["error_login"] = $errors;

        header("Location: login.php");
        die();
    }

    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result["id"];
    session_id($sessionId);

    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_Email"] = htmlspecialchars($result["Email"]);
    $_SESSION['last_regeneration'] = time();


    header("Location: home_logged1.php?login=success");
    $pdo = null;
    $stmt = null;
    die();
    } catch(PDOException $e) {
        die("QUERY FAILED!" . $e->getMessage());
    }
} else {
        header("Location: login.php");
        die();
}

?>