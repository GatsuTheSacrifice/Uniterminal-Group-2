<?php
declare(strict_types=1);

function output_session(){
    if(isset($_SESSION["user_id"])){
    echo ' <header class="header-main">
    <div class="header-logo"> <img class="unity" src="logo.jpg" alt="Uniterminal Logo"></div>
    <div class="text">
    <h3 class="uniterminal-text">Uniterminal Bus System
    <br>Provincial Bus Service</h3>
    </div>
    <nav class="header-nav">
        <ul>
            <li><a href="signup-form.php">Home</a></li>
            <li><a href="#">Schedules</a></li>
            <li><a href="#">Tickets</a></li>
            <li><a href="#">Terminals</a></li>
            <li><a href="#">About Us</a></li>
            <li>' . $_SESSION["user_Email"] . ' 
        </ul>
    </nav>
</header>';
    }
}

function check_login_errors(){
   if (isset($_SESSION["error_login"])){
    $errors = $_SESSION["error_login"];
    echo '<br>';
    foreach($errors as $error){
        echo '<p>' . $error . '</p>';
    }
    unset($_SESSION["error_login"]);
    } else if(isset($_GET['login']) && $_GET['login'] === "success") {
        echo "<br>";
        echo "<p>Login Success!</p>";
    }
}
?>