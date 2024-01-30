<?php
require_once 'session.inc.php';
require_once 'login_view.in.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/hagrid-trial">
    <link rel="stylesheet" href="log in.css">
    <link rel="icon" type="image/jpg" href="logo.jpg">
    <title>Uniterminal</title>

</head>
<body>
  <div class="log-in"> 
      <img class="logo" src="logo.jpg" alt="">
      <h1 class="title"> Log In </h1>
      <form action="login.inc.php" method="POST">
<?php
check_login_errors();
?>  
        <input class="email" type="text" placeholder="Email" name="Email" required>
        <input class="password" type="password" placeholder="Password" name="Pass" required>
       <button class="button"> LOGIN </button>
      </form>
  </div>
</body>
</html>