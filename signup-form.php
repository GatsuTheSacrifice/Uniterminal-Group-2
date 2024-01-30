<?php
require_once 'session.inc.php';
require_once 'signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="sign up.css">
  <link href="https://fonts.cdnfonts.com/css/hagrid-trial" rel="stylesheet">
  <link rel="icon" type="image/jpg" href="logo.jpg">
  <title>Uniterminal</title>

</head>
<?php
      check_signup_errors();
      ?>
<body>
  <div class="sign-up-form"> 
      <img class="logo" src="logo.jpg" alt="">
      <h1> Sign In </h1>
      <form action="signup.inc.php" method="POST">
       <label>Email</label>
       <input type="email" class="input-email" name="Email" placeholder="Enter Email" required>
       <label>Password</label>
      <input type="password" class="input-password" name="Pass" placeholder="Enter Password" required>
      <label>Re-Type Password</label>
    <input type="password" class="input-repassword" placeholder="Re-Type Password" name="RePass" required>
        <button class="button">SIGN UP</button>
      </form>
      

      <p> By clicking the Sign Up button, you agree to our <br>
       <a href="#">Terms of Service </a> and <a href="#">Privacy Policy</a>
      </p>
      <p> Already have an account? <a href="login.php">Log In</a></p>
  </div>

  
  
</body>
</html>