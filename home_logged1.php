<?php
require_once 'session.inc.php';
require_once 'login_view.in.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="home_logged.css">
    <link href="https://fonts.cdnfonts.com/css/hagrid-trial" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="logo.jpg">
    
    <title>Home - Uniterminal</title>
</head>
<body>
<header class="header-main">
    <div class="header-logo"> <img class="unity" src="logo.jpg" href="new.html" alt="Uniterminal Logo"></div>
    <div class="text">
    <h3 class="uniterminal-text">Uniterminal Bus System
    <br>Provincial Bus Service</h3>
    </div>
    <nav class="header-nav">
        <ul>
            <li><a href="signup-form.php" >Home</a></li> 
            <li><a href="#" onclick="toggleMenuSchedules()">Schedules</a></li>
            <li><a href="#" onclick="toggleMenuTickets()">Tickets</a></li>
            <li><a href="#" onclick="toggleMenuTerminal()">Terminals</a></li>
            <li><a href="#">About Us</a></li>
            
        <img src="icon 1.jpg" alt="user icon" class="icon" onclick="toggleMenu()">

        </ul>

        <!-- user profile -->
        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu"> 
              <div class="user-info">
                  <img src="icon 1.jpg" class="icon2">
                  <h3>Account Settings  </h3>
              </div>
              <hr>

                <a href="tandc.html" class="sub-menu-link">
                  <img src="t&c.png" alt="">
                  <p> Terms and Conditions</p>
                  <span>></span>
                </a>

                <a href="contact.html" class="sub-menu-link">
                  <img src="customer-service.png" alt="">
                  <p> Contact / Helpdesk</p>
                  <span>></span>
                </a>

                <a href="#" class="sub-menu-link">
                  <img src="logout.png" alt="">
                  <form action="logout.inc.php">
                  <button class="logout"> Log Out</button>
                  </form>
                  <span>></span>
                </a>

          </div>
        </div>

<!-- Terminals -->

<div class="sub-menu-wrap-terminal" id="subMenuTerminal">
  <div class="sub-menu-terminal"> 
        <a href="#" class="sub-menu-link-terminal">
          <img src="pin.png" alt="">
          <p> MAIN TO NORTH V.V</p>
          <span>></span>
        </a>
<hr class="line-terminal">
        <a href="#" class="sub-menu-link-terminal">
          <img src="pin.png" alt="">
          <p> MAIN TO SOUTH V.V</p>
          <span>></span>
        </a>

  </div>
</div>


<!-- Tickets -->

<div class="sub-menu-wrap-tickets" id="subMenuTickets">
  <div class="sub-menu-tickets"> 
        <a href="#" class="sub-menu-link-tickets">
          <img src="pin.png" alt="">
          <p> MAIN TO NORTH V.V</p>
          <span>></span>
        </a>
<hr class="line-terminal">
        <a href="#" class="sub-menu-link-tickets">
          <img src="pin.png" alt="">
          <p> MAIN TO SOUTH V.V</p>
          <span>></span>
        </a>

  </div>
</div>


<!-- Schedules -->

<div class="sub-menu-wrap-schedules" id="subMenuSchedules">
  <div class="sub-menu-schedules"> 
        <a href="#" class="sub-menu-link-schedules">
          <img src="pin.png" alt="">
          <p> MAIN TO NORTH V.V</p>
          <span>></span>
        </a>
<hr class="line-schedules">
        <a href="#" class="sub-menu-link-schedules">
          <img src="pin.png" alt="">
          <p> MAIN TO SOUTH V.V</p>
          <span>></span>
        </a>

  </div>
</div>

    </nav>

    <script>
      let subMenu = document.getElementById("subMenu");

      function toggleMenu(){
        subMenu.classList.toggle("open-menu");
      }
    </script>

  <script>
    let subMenuTerminal = document.getElementById("subMenuTerminal");

    function toggleMenuTerminal(){
      subMenuTerminal.classList.toggle("open-terminal");
    }
  </script>

  <script>
    let subMenuTickets = document.getElementById("subMenuTickets");

    function toggleMenuTickets(){
      subMenuTickets.classList.toggle("open-tickets");
    }
  </script>

<script>
  let subMenuSchedules = document.getElementById("subMenuSchedules");

  function toggleMenuSchedules(){
    subMenuSchedules.classList.toggle("open-schedules");
  }
</script>


</header>


<div class="welcome">
    <p class="caption"> Welcome to the North and South Luzon Bus Systems Co. We are happy to serve you on your hassle-free and comfortable trip. </p>
</div>
<div class="title"> <p class="caption-title">Home </p> </div>
  
  <div class="bus_bg"> <img class="pic_bus" src="BUSBG.jpg"> </div>
  <div id="foo"></div>

  <div class="overlay-container">
    <div class="content">
      <h1 class="welcometitle"> Mabuhay and Welcome Passengers!</h1>
      <p class="cap"> Seat back, relax and enjoy your convenient, safe and well-accommodated experience with us!</p>
      <hr>
      <br>
      <p class="cap2"> BOOK YOUR TRIP WITH US NOW! </p>
      <button class="booking_button"> <a href="booking_form.php"> BOOKING FORM </a></button>
      <p class="cap3"> Click the button above to access booking form</p>
      
    </div>
  </div>

  <div class="home_text">
    <h3> We Offer </h3>
    <h3> Transportation from</h3>
    <h3> NORTH to SOUTH LUZON</h3>
  </div>

  <button class="button_sched"> FIND SCHEDULES </button>
  <button class="button_info"> BUS INFORMATION </button>

  <div class="map"> <img src="map.png"> </div>

  <br> <br> <br> <br> <br> 

<div>
  <h1 class="contact"> Contact Us!</h1>
  <img class="fb_logo" src="2021_Facebook_icon.svg.png" alt="">
  <h3 class="fb_name"> Uniterminal Bus System Co.</h3>
 
  <img class="tele_logo" src="tele.png" alt="">
  <h3 class="tele_no"> (02) 290-7328</h3>

  <img class="loca_logo" src="loca.png" alt="">
  <h3 class="location"> Pasay, Metro Manila, Philippines (Main Branch) </h3>

  <img class="ig_logo" src="ig.png" alt="">
  <h3 class="ig_name"> @uniterminal.bus</h3>

</div>

<div class="buspicdiv"> <img class="buspic" src="buspic.png" alt=""></div>

<br><br><br><br><br><br>

<footer class="navbar_down">
  <div class="navdiv_down">
    <ul class="nav_down">
      <li><a href="#"> Home </a></li>
      <li><a href="#"> About Us </a></li>
      <li><a href="#"> Terminals </a></li>
    </ul>  

  </div> 
  <div class="button"> <a href="home.html">
  <button class="backtotop"> BACK TO TOP</button> </a> 
  <h3 class="allrights"> UNITERMINAL ALL RIGHTS RESERVED &copy; 2024</h3>
  </div>    
  
  </footer>
</body>
</html>