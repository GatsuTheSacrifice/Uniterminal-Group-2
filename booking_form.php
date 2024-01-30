<?php
require_once 'session.inc.php';
require_once 'login_view.in.php';
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/hagrid-trial?styles=52964" rel="stylesheet">
    <link rel="stylesheet" href="booking_form.css">
    <title> Online Booking Form | UNITERMINAL </title>
</head>
<body>
<div class="hh"> 

    <img src="logo.jpg" width="200px">
    <h1> Online Booking Form </h1>
    <p> Please fill out all of the necessary information needed. </p>

</div>
<section class="container"> 
    <header> Passenger Information </header>
    <form action="booking_form_insert.inc.php" method="POST" class="form"> 

        <div class="column"> 
        <div class="input-box">
            <label> First Name </label>
            <input type="text" placeholder="Juan" name="First_Name" required>  
        </div>

        <div class="input-box">
            <label> Last Name </label>
            <input type="text" placeholder="Dela Cruz" name="Last_Name" required>  
        </div>
        </div>


        <div class="column"> 
            <div class="input-box">
                <label> Age </label>
                <br>
                <input type="number" min="10" max="120" name="Age" required>  
            </div>
    
            <div class="input-box">
                <label> Gender </label>
                <br>
                <select id = "gender" name="Gender" required>
                <option> </option>
                <option> FEMALE </option>
                <option> MALE </option>
                <option> OTHERS </option>
                </select>
            </div>
            </div>
        
            <div class="column"> 
                <div class="input-box">
                    <label> Contact Number </label>
                    <input type="tel" placeholder="Ex.: 0995-123-4567" name="Contact_Number" required>  
                </div>
        
            <div class="input-box">
                <label> Email Address(Email Used in Signing-In!) </label>
                <input type="email" placeholder="juandelacruz@gmail.com" name="Email_Address" >
                </div>
            </div>
            <header> Bus Trip Details </header>
            <br> 
            <div class="column"> 
            <div class="input-box"> 
                <label> Trip Date </label>
                <br>
                <input type="date" name="Trip_Date" required>
            </div>
                <div class="input-box">
                    <label> Location </label>
                    <br>
                    <select name="Location" id="locSel">
                        <option></option>
                    </select>
                </div>
            </div>
            
            <div class="column"> 
            <div class="input-box">
                <label> Station - Destination </label>
                <br>
                <select id = "tripSel" name="Trip" required></select>
            </div>
                <div class="input-box">
                    <label>Time</label>
                    <br>
                    <select id="timeSel" name="Departure_Time" required></select>
                </div>
            </div>

            <div class="column">
            <div class="input-box">
                <label> Bus Type </label>
                <br>
                <select id = "typeSel" name="Bus_Type" required>
                    </select>
                </div>   
                  <div class="input-box">
                <label> Price </label>
                <br>
                <select id = "priceSel" name="Price" required>
                    </select>
                  </div>
                </div> 

                <br>
                <header> Payment </header>
                <br> 
            
            <img src="qr.jpg" width="150px" height="150px">
            <div class="input-box">
                <label>Reference Number:</label>

                <input type="text" name="Ref_Num">
            </div>
            <div class="note">
            <p> <span style="color: red;">NOTE: </span> Please pay your ticket price within 24 hours. Failure to do so will cancel the booking. </p>
            </div>

        </section>

                <input type="submit" onclick="openPopup(); scrollToTop()" name="submit" value="CONFIRM BOOKING" style="margin-top: 15px; height: 40px; max-width: 200px; width: 100%; border-radius: 25px; border: none; background: rgb(255,255,255);
                background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(129,186,187,1) 35%, rgba(129,186,187,1) 35%); font-size: 15px; cursor: pointer;" >

        <div class="popup" id="popup">
            <img src="tick.png">
            <h2>Booking Confirmed</h2>
            <p>Thank you for your booking. Keep a screenshot of this transaction for your reference</p>
            <br>
            <button type="button" onclick="closePopup()">OK</button>
        </div>
            
            </form>

    <script>

        let popup = document.getElementById("popup");
        
        function openPopup(){
            popup.classList.add("open-popup");
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }
        function scrollToTop(){
            window.scrollTo(0,0);
        }

    </script>
    </body>
    
    <script>

//other//
        var tripObject = {
            "MAIN - NORTH TRIPS" : {

            "PASAY - BAGUIO": {
                "1:00PM":{
                "FIRST CLASS" : ["500"],
                "DELUXE" : ["700"]
                },
                "7:00PM":{
                "FIRST CLASS" : ["500"],
                "DELUXE": ["700"],
                "SUPER DELUXE": ["1000"]
                },
                "9:30PM":{
                "FIRST CLASS":["500"],
                "DELUXE":["700"]
                }
            },

            "PASAY - BANGUED" : {
                "6:00AM":{
                    "DELUXE":["1000"],
                    "SUPER DELUXE":["1350"]
                },
                "2:15PM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["1000"]
                },
                "5:00PM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["1000"]
                }
            },

            "PASAY - CABUGAO":{
                "9:00AM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"]
                },
                "3:00PM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"],
                    "SUPER DELUXE":["1550"]
                },
                "7:30PM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"],
                    "SUPER DELUXE":["1550"]
                }
                
            },

            "PASAY - CANDON":{
                "7:00AM":{
                    "FIRST CLASS":["650"],
                    "DELUXE":["950"],
                },
                "2:30PM":{
                    "FIRST CLASS":["650"],
                    "SUPER DELUXE":["1300"]
                },
                "5:30PM":{
                    "FIRST CLASS":["650"],
                    "DELUXE":["950"],
                }
                
            },
            
            "PASAY - LAOAG":{
                "8:00AM":{
                    "FIRST CLASS":["1000"],
                    "DELUXE":["1400"],
                },
                "2:00PM":{
                    "FIRST CLASS":["1000"],
                    "DELUXE":["1400"],
                    "SUPER DELUXE":["1800"]
                },
                "6:00PM":{
                    "FIRST CLASS":["1000"],
                    "DELUXE":["1400"],
                    "SUPER DELUXE":["1800"]
                }
                
            },

            "PASAY - LA UNION":{
                "7:00AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"],
                    "SUPER DELUXE":["1250"]
                },
                "2:00PM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"],
                },
                "7:00PM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"],
                    "SUPER DELUXE":["1250"]
                }
                
            },

            "PASAY - PAGUDPUD":{
                "5:30AM":{
                    "FIRST CLASS":["1350"],
                    "DELUXE":["1700"],
                },
                "2:00PM":{
                    "FIRST CLASS":["1350"],
                    "DELUXE":["1700"],
                    "SUPER DELUXE":["2100"]
                },
                "6:00PM":{
                    "FIRST CLASS":["1350"],
                    "DELUXE":["1700"],
                    "SUPER DELUXE":["2100"]
                }
                
            },

            "PASAY - TUGUEGARAO":{
                "5:30AM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"],
                },
                "10:30AM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"],
                },
                "3:30PM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"],
                    "SUPER DELUXE":["1400"]
                }
                
            },

            "PASAY - VIGAN":{
                "8:00AM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["1000"],
                },
                "2:30PM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["1000"],
                },
                "8:00PM":{
                    "DELUXE":["1000"],
                    "SUPER DELUXE":["1400"]
                }
                
            }

        },
            "NORTH TRIPS" :{
            "BAGUIO - BANGUED":{
                "9:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "12:00PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "4:00PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"],
                    "SUPER DELUXE":["900"]
                }
            },

            "BAGUIO - CABUGAO":{
                "10:00AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"]
                },
                "4:00PM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"]
                },
                "6:00PM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"],
                    "SUPER DELUXE":["1125"]
                }
            },

            "BAGUIO - CANDON":{
                "9:00AM":{
                    "FIRST CLASS":["250"],
                    "DELUXE":["500"]
                },
                "2:00PM":{
                    "FIRST CLASS":["250"],
                    "DELUXE":["500"]
                },
                "7:30PM":{
                    "FIRST CLASS":["250"],
                    "DELUXE":["500"]
                   
                }
            },

            "BAGUIO - LAOAG":{
                "10:30AM":{
                    "FIRST CLASS":["750"],
                    "DELUXE":["1000"]
                },
                "2:00PM":{
                    "FIRST CLASS":["750"],
                    "DELUXE":["1000"]
                },
                "6:00PM":{
                    "FIRST CLASS":["750"],
                    "DELUXE":["1000"],
                    "SUPER DELUXE":["1350"]
                }
            },
            
            "BAGUIO - LA UNION":{
                "8:00AM":{
                    "FIRST CLASS":["125"],
                    "DELUXE":["250"]
                },
                "1:00PM":{
                    "FIRST CLASS":["125"],
                },
                "5:00PM":{
                    "FIRST CLASS":["125"],
                    "DELUXE":["250"],

                }
            },

            "BAGUIO - PAGUDPUD":{
                "6:00AM":{
                    "FIRST CLASS":["900"],
                    "DELUXE":["1200"]
                },
                "8:30AM":{
                    "FIRST CLASS":["900"],
                    "DELUXE":["1200"]
                },
                "3:00PM":{
                    "FIRST CLASS":["900"],
                    "DELUXE":["1200"],
                    "SUPER DELUXE":["1450"]
                }
            },

            "BAGUIO - PASAY":{
                "6:30AM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["700"]
                },
                "1:00PM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["700"]
                },
                "7:00PM":{
                    "DELUXE":["700"],
                    "SUPER DELUXE":["1000"]
                }
            },

            "BAGUIO - TUGUEGARAO":{
                "7:00AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"]
                },
                "11:00AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"]
                },
                "4:00PM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"],
                    "SUPER DELUXE":["1125"]
                }
            },

            "BAGUIO - VIGAN":{
                "7:30AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "9:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "12:30PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"],
                    "SUPER DELUXE":["900"]
                }
            },

            "BAGUIO - VIGAN":{
                "7:30AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "9:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "12:30PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"],
                    "SUPER DELUXE":["900"]
                }
            },

            "BANGUED - BAGUIO":{
                "8:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "1:00PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "7:00PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"],
                    "SUPER DELUXE":["900"]
                }
            },

            "BANGUED - CABUGAO":{
                "1:30PM":{
                    "FIRST CLASS":["275"],
                    "DELUXE":["500"]
                },
                "3:00PM":{
                    "FIRST CLASS":["275"],
                },
                "7:30PM":{
                    "FIRST CLASS":["275"],
                    "DELUXE":["500"],
                }
            },

            "BANGUED - CANDON":{
                "6:00AM":{
                    "FIRST CLASS":["200"],
                    "DELUXE":["400"]
                },
                "12:00PM":{
                    "FIRST CLASS":["200"],
                },
                "4:30PM":{
                    "FIRST CLASS":["200"],
                    "DELUXE":["400"],
                }
            },

            "BANGUED - LAOAG":{
                "7:30AM":{
                    "FIRST CLASS":["450"],
                    "DELUXE":["775"]
                },
                "12:00PM":{
                    "FIRST CLASS":["450"],
                    "DELUXE":["775"]
                },
                "4:30PM":{
                    "FIRST CLASS":["450"],
                    "DELUXE":["775"],
                    "SUPER DELUXE":["1050"]
                }
            },

            "BANGUED - LA UNION":{
                "8:00AM":{
                    "FIRST CLASS":["350"],
                    "DELUXE":["550"]
                },
                "12:00PM":{
                    "FIRST CLASS":["350"],
                    "DELUXE":["550"]
                },
                "3:00PM":{
                    "FIRST CLASS":["350"],
                    "DELUXE":["550"],
                    "SUPER DELUXE":["750"]
                }
            },

            "BANGUED - PAGUPUD":{
                "7:00AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"]
                },
                "12:00PM":{
                    "SUPER DELUXE":["1225"]
                },
                "3:00PM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"]
                }
            },

            "BANGUED - PASAY":{
                "10:00AM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["1000"]
                },
                "1:30PM":{
                    "FIRST CLASS":["700"],
                    "SUPER DELUXE":["1000"]
                },
                "3:00PM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["1000"]
                }
            },

            "BANGUED - TUGUEGARAO":{
                "9:00AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["920"]
                },
                "2:00PM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["920"]
                },
                "6:30PM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["920"],
                    "SUPER DELUXE":["1210"]
                }
            },

            "BANGUED - VIGAN":{
                "2:00PM":{
                    "FIRST CLASS":["150"],
                    "DELUXE":["300"]
                },
                "5:30PM":{
                    "DELUXE":["150"]
                },
                "8:00PM":{
                    "FIRST CLASS":["150"],
                    "DELUXE":["300"]                 
                }
            },

            "CABUGAO - BAGUIO":{
                "9:00AM":{
                    "FIRST CLASS":["550"],
                },
                "2:00PM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"]
                },
                "6:30PM":{
                    "DELUXE":["850"],
                    "SUPER DELUXE":["1125"]
                }
            },

            "CABUGAO - BANGUED":{
                "6:00AM":{
                    "FIRST CLASS":["275"],
                    "DELUXE":["500"]
                },
                "2:15PM":{
                    "FIRST CLASS":["275"]
                },
                "8:30PM":{
                    "DELUXE":["500"]
                }
            },

            "CABUGAO - CANDON":{
                "8:00AM":{
                    "FIRST CLASS":["175"],
                    "DELUXE":["300"]
                },
                "10:00AM":{
                    "FIRST CLASS":["175"]
                },
                "3:30PM":{
                    "DELUXE":["300"]
                }
            },

            "CABUGAO - LAOAG":{
                "12:30PM":{
                    "FIRST CLASS":["175"],
                    "DELUXE":["300"]
                },
                "4:00PM":{
                    "FIRST CLASS":["175"]
                },
                "8:00PM":{
                    "DELUXE":["300"]
                }
            },

            "CABUGAO - LA UNION":{
                "8:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["800"]
                },
                "1:00PM":{
                    "DELUXE":["800"],
                    "SUPER DELUXE":["1050"]
                },
                "6:30PM":{
                    "DELUXE":["800"],
                }
            },

            "CABUGAO - PAGUDPUD":{
                "7:30AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                },
                "10:00AM":{
                    "FIRST CLASS":["400"]
                },
                "2:00PM":{
                    "SUPER DELUXE":["1000"]
                }
            },

            "CABUGAO - PASAY":{
                "6:00AM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"]
                },
                "3:30PM":{
                    "FIRST CLASS":["800"],
                    "SUPER DELUXE":["1550"]
                },
                "8:30PM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"]
                }
            },

            "CABUGAO - TUGUEGARAO":{
                "6:00AM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["800"]
                },
                "1:00PM":{
                    "FIRST CLASS":["500"],
                    "SUPER DELUXE":["1050"]
                },
                "7:30PM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["800"]
                }
            },

            "CANDON - BAGUIO":{
                "7:30AM":{
                    "FIRST CLASS":["250"],
                    "DELUXE":["500"]
                },
                "10:00AM":{
                    "FIRST CLASS":["250"]
                },
                "5:30PM":{
                    "DELUXE":["500"]
                }
            },

            "CANDON - BANGUED":{
                "7:30AM":{
                    "FIRST CLASS":["200"],
                    "DELUXE":["400"]
                },
                "10:00AM":{
                    "FIRST CLASS":["200"]
                },
                "5:30PM":{
                    "DELUXE":["400"]
                }
            },

            "CANDON - CABUGAO":{
                "9:00AM":{
                    "FIRST CLASS":["175"],
                    "DELUXE":["300"]
                },
                "1:00PM":{
                    "FIRST CLASS":["175"]
                },
                "5:30PM":{
                    "DELUXE":["300"]
                }
            },

            "CANDON - LAOAG":{
                "8:00AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["800"]
                },
                "12:00PM":{
                    "FIRST CLASS":["550"]
                },
                "5:30PM":{
                    "DELUXE":["800"],
                    "SUPER DELUXE":["1000"]
                }
            },

            "CANDON - LA UNION":{
                "9:30AM":{
                    "FIRST CLASS":["175"],
                    "DELUXE":["300"]
                },
                "1:00PM":{
                    "FIRST CLASS":["175"]
                },
                "4:00PM":{
                    "DELUXE":["300"]
                }
            },

            "CANDON - PAGUDPUD":{
                "6:30AM":{
                    "FIRST CLASS":["625"],
                    "DELUXE":["950"]
                },
                "11:00AM":{
                    "DELUXE":["950"]
                },
                "3:30PM":{
                    "DELUXE":["950"],
                    "SUPER DELUXE":["1275"]
                }
            },

            "CANDON - PASAY":{
                "8:30AM":{
                    "FIRST CLASS":["650"],
                    "DELUXE":["950"]
                },
                "1:30PM":{
                    "FIRST CLASS":["650"],
                    "DELUXE":["950"]
                },
                "5:30PM":{
                    "DELUXE":["950"],
                    "SUPER DELUXE":["1300"]
                }
            },

            "CANDON - TUGUEGARAO":{
                "6:00AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"]
                },
                "12:00PM":{
                    "DELUXE":["900"]
                },
                "6:00PM":{
                    "FIRST CLASS":["600"],
                    "SUPER DELUXE":["1200"]
                }
            },

            "CANDON - VIGAN":{
                "8:00AM":{
                    "FIRST CLASS":["125"],
                    "DELUXE":["275"]
                },
                "3:00PM":{
                    "FIRST CLASS":["125"],
                    "DELUXE":["275"]
                },
                "7:00PM":{
                    "DELUXE":["275"]
                }
            },

            "LAOAG - BANGUED":{
                "8:00AM":{
                    "FIRST CLASS":["160"],
                },
                "10:00AM":{
                    "FIRST CLASS":["160"],
                    "DELUXE":["250"]
                },
                "2:00PM":{
                    "DELUXE":["250"]
                }
            },

            "LAOAG - BAGUIO":{
                "7:30AM":{
                    "FIRST CLASS":["750"],
                    "DELUXE":["1000"]
                },
                "11:00AM":{
                    "FIRST CLASS":["750"],
                    "DELUXE":["1000"]
                },
                "4:30PM":{
                    "DELUXE":["1000"],
                    "SUPER DELUXE":["1350"]
                }
            },

            "LAOAG - CABUGAO":{
                "12:00PM":{
                    "FIRST CLASS":["200"],
                },
                "5:00PM":{
                    "FIRST CLASS":["200"],
                    "DELUXE":["400"]
                },
                "7:00PM":{
                    "DELUXE":["400"]
                }
            },

            "LAOAG - CANDON":{
                "9:30AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["800"]
                },
                "4:30PM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["800"]
                },
                "7:00PM":{
                    "SUPER DELUXE":["1000"]
                }
            },

            "LAOAG - LA UNION":{
                "6:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                },
                "10:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                },
                "2:30PM":{
                    "FIRST CLASS":["400"],
                    "SUPER DELUXE":["1000"]
                }
            },

            "LAOAG - PAGUDPUD":{
                "1:30PM":{
                    "FIRST CLASS":["150"],
                    "DELUXE":["325"]
                },
                "4:00PM":{
                    "FIRST CLASS":["150"]
                },
                "8:30PM":{
                    "DELUXE":["325"]
                }
            },
            
            "LAOAG - PASAY":{
                "6:00AM":{
                    "FIRST CLASS":["1000"],
                    "DELUXE":["1400"]
                },
                "2:30PM":{
                    "FIRST CLASS":["1000"],
                    "DELUXE":["1400"]
                },
                "6:30PM":{
                    "FIRST CLASS":["1000"],
                    "SUPER DELUXE":["1800"]
                }
            },

            "LAOAG - TUGUEGARAO":{
                "7:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                },
                "1:00PM":{
                    "DELUXE":["700"]
                },
                "6:00PM":{
                    "FIRST CLASS":["400"],
                    "SUPER DELUXE":["1000"]
                }
            },

            "LAOAG - VIGAN":{
                "10:00AM":{
                    "FIRST CLASS":["200"]
                },
                "2:00PM":{
                    "FIRST CLASS":["200"],
                    "DELUXE":["400"]
                },
                "6:00PM":{
                    "DELUXE":["400"]
                }
            },

            "PAGUDPUD - BAGUIO":{
                "6:00AM":{
                    "FIRST CLASS":["1350"],
                    "DELUXE":["1700"]
                },
                "10:30AM":{
                    "FIRST CLASS":["1350"],
                    "DELUXE":["1700"]
                },
                "3:00PM":{
                    "SUPER DELUXE":["2100"]
                }
            },

            "PAGUDPUD - BANGUED":{
                "7:00AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"]
                },
                "9:30AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"]
                },
                "3:00PM":{
                    "SUPER DELUXE":["1225"]
                }
            },

            "PAGUDPUD - CABUGAO":{
                "2:00PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                },
                "5:00PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                },
                "7:30PM":{
                    "SUPER DELUXE":["1000"]
                }
            },

            "PAGUDPUD - CANDON":{
                "6:00AM":{
                    "FIRST CLASS":["625"],
                    "DELUXE":["950"]
                },
                "11:00AM":{
                    "DELUXE":["950"]
                },
                "2:00PM":{
                    "FIRST CLASS":["625"],
                    "SUPER DELUXE":["1275"]
                }
            },

            "PAGUDPUD - LAOAG":{
                "7:30AM":{
                    "FIRST CLASS":["150"],
                    "DELUXE":["325"]
                },
                "1:30PM":{
                    "DELUXE":["325"]
                },
                "3:00PM":{
                    "FIRST CLASS":["150"]
                }
            },
            
            "PAGUDPUD - LA UNION":{
                "8:30AM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["900"]
                },
                "1:00pM":{
                    "DELUXE":["900"],
                    "SUPER DELUXE":["1250"]
                },
                "5:00PM":{
                    "FIRST CLASS":["700"],
                }
            },

            "PAGUDPUD - PASAY":{
                "5:00AM":{
                    "FIRST CLASS":["1350"],
                    "DELUXE":["1700"]
                },
                "10:00AM":{
                    "DELUXE":["1700"]
                },
                "2:00PM":{
                    "FIRST CLASS":["1350"],
                    "SUPER DELUXE":["2100"]
                }
            },

            "PAGUDPUD - TUGUEGARAO":{
                "5:30AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["875"]
                },
                "9:30AM":{
                    "DELUXE":["875"]
                },
                "4:00PM":{
                    "FIRST CLASS":["550"],
                    "SUPER DELUXE":["1200"]
                }
            },

            "PAGUDPUD - VIGAN":{
                "9:00AM":{
                    "FIRST CLASS":["450"],
                    "DELUXE":["725"]
                },
                "2:30PM":{
                    "DELUXE":["750"],
                    "SUPER DELUXE":["1050"]
                },
                "4:00PM":{
                    "FIRST CLASS":["450"]
                }
            },

            "TUGUEGARAO - BAGUIO":{
                "9:00AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["850"]
                },
                "11:00AM":{
                    "FIRST CLASS":["550"],
                    "SUPER DELUXE":["1125"]
                },
                "5:30PM":{
                    "DELUXE":["850"]
                }
            },

            "TUGUEGARAO - BANGUED":{
                "7:00AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["920"]
                },
                "11:00AM":{
                    "SUPER DELUXE":["1210"]
                },
                "3:30PM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["920"]
                }
            },

            "TUGUEGARAO - CABUGAO":{
                "6:00AM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["800"]
                },
                "12:00PM":{
                    "SUPER DELUXE":["1050"]
                },
                "3:30PM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["800"]
                }
            },


            "TUGUEGARAO - CANDON":{
                "7:00AM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"]
                },
                "1:00PM":{
                    "SUPER DELUXE":["1200"]
                },
                "4:30PM":{
                    "FIRST CLASS":["600"],
                    "DELUXE":["900"]
                }
            },

            "TUGUEGARAO - LAOAG":{
                "8:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                },
                "2:00PM":{
                    "SUPER DELUXE":["1000"]
                },
                "5:30PM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["700"]
                }
            },

            "TUGUEGARAO - LA UNION":{
                "9:00AM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["800"]
                },
                "3:00PM":{
                    "SUPER DELUXE":["1100"]
                },
                "6:00PM":{
                    "FIRST CLASS":["500"],
                    "DELUXE":["800"]
                }
            },

            "TUGUEGARAO - PAGUDPUD":{
                "10:00AM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["875"]
                },
                "3:00PM":{
                    "SUPER DELUXE":["1200"]
                },
                "7:00PM":{
                    "FIRST CLASS":["550"],
                    "DELUXE":["875"]
                }
            },

            "TUGUEGARAO - PASAY":{
                "8:00AM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"]
                },
                "3:30PM":{
                    "SUPER DELUXE":["1400"]
                },
                "7:30PM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1100"]
                }
            },

            "TUGUEGARAO - VIGAN":{
                "5:30AM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1150"]
                },
                "10:00AM":{
                    "SUPER DELUXE":["1400"]
                },
                "3:30PM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1150"]
                }
            },

            "VIGAN - BAGUIO":{
                "6:00AM":{
                    "FIRST CLASS":["400"],
                    "DELUXE":["650"]
                },
                "9:00AM":{
                    "DELUXE":["650"]
                },
                "12:30PM":{
                    "FIRST CLASS":["400"],
                    "SUPER DELUXE":["900"]
                }
            },

            "VIGAN - BANGUED":{
                "6:00AM":{
                    "FIRST CLASS":["150"],
                    "DELUXE":["300"]
                },
                "2:00PM":{
                    "DELUXE":["300"],
                },
                "7:30PM":{
                    "FIRST CLASS":["150"],
                }
            },

            "VIGAN - CANDON":{
                "10:00AM":{
                    "FIRST CLASS":["125"],
                    "DELUXE":["275"]
                },
                "3:30PM":{
                    "DELUXE":["275"],
                },
                "6:00PM":{
                    "FIRST CLASS":["125"],
                }
            },

            "VIGAN - LAOAG":{
                "6:30AM":{
                    "FIRST CLASS":["200"],
                    "DELUXE":["400"]
                },
                "1:30PM":{
                    "DELUXE":["400"]
                },
                "4:00PM":{
                    "FIRST CLASS":["200"],
                }
            },

            "VIGAN - LA UNION":{
                "8:00AM":{
                    "FIRST CLASS":["250"],
                    "DELUXE":["500"]
                },
                "1:00PM":{
                    "DELUXE":["500"]
                },
                "3:30PM":{
                    "FIRST CLASS":["250"],
                }
            },

            "VIGAN - PAGUDPUD":{
                "6:00AM":{
                    "FIRST CLASS":["450"],
                    "DELUXE":["725"]
                },
                "12:00PM":{
                    "DELUXE":["725"]
                },
                "5:30PM":{
                    "FIRST CLASS":["450"],
                    "SUPER DELUXE":["1050"]
                }
            },

            "VIGAN - PASAY":{
                "7:00AM":{
                    "FIRST CLASS":["700"],
                    "DELUXE":["1000"]
                },
                "9:00AM":{
                    "DELUXE":["1000"]
                },
                "3:30PM":{
                    "FIRST CLASS":["700"],
                    "SUPER DELUXE":["1400"]
                }
            },

            "VIGAN - TUGUEGARAO":{
                "6:00AM":{
                    "FIRST CLASS":["800"],
                    "DELUXE":["1150"]
                },
                "11:00AM":{
                    "FIRST CLASS":["800"]
                },
                "3:30PM":{
                    "DELUXE":["1150"],
                    "SUPER DELUXE":["1400"]
                }
            },
        },  
            "MAIN - SOUTH":{

                "PASAY - BATANGAS CITY": {
                "9:00AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "3:00PM":{
                "FIRST CLASS" : ["250"]
                },
                "6:00PM":{
                "DELUXE":["350"]
                }
            },

            "PASAY - BATANGAS PIER": {
                "8:00AM":{
                "FIRST CLASS" : ["260"],
                "DELUXE" : ["360"]
                },
                "2:00PM":{
                "FIRST CLASS" : ["260"]
                },
                "5:30PM":{
                "DELUXE":["360"]
                }
            },

            "PASAY - DASMARIÑAS": {
                "11:00AM":{
                "FIRST CLASS" : ["190"],
                "DELUXE" : ["270"]
                },
                "4:00PM":{
                "FIRST CLASS" : ["250"]
                },
                "8:00PM":{
                "DELUXE":["270"]
                }
            },

            "PASAY - LEGAZPI": {
                "7:00AM":{
                "FIRST CLASS" : ["500"],
                "DELUXE" : ["680"]
                },
                "2:00PM":{
                "FIRST CLASS" : ["500"]
                },
                "6:30PM":{
                "DELUXE":["680"],
                "SUPER DELUXE":["820"]
                }
            },

            "PASAY - NAGA": {
                "8:00AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "3:00PM":{
                "FIRST CLASS" : ["450"]
                },
                "7:30PM":{
                "DELUXE":["630"],
                "SUPER DELUXE":["770"]
                }
            },

            "PASAY - STA.ROSA": {
                "7:00AM":{
                "FIRST CLASS" : ["210"],
                "DELUXE" : ["290"]
                },
                "12:00PM":{
                "FIRST CLASS" : ["210"]
                },
                "3:30PM":{
                "DELUXE":["290"],
                }
            },

        },

            "SOUTH TRIPS":{

             "BATANGAS CITY - DASMARIÑAS": {
                "6:00AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "11:00AM":{
                "FIRST CLASS" : ["250"]
                },
                "4:00PM":{
                "DELUXE":["350"]
                }
            },

            "BATANGAS CITY - LEGAZPI": {
                "7:00AM":{
                "FIRST CLASS" : ["500"],
                "DELUXE" : ["680"]
                },
                "12:00PM":{
                "FIRST CLASS" : ["500"]
                },
                "6:00PM":{
                "DELUXE":["680"],
                "SUPER DELUXE":["820"]
                }
            },

            "BATANGAS CITY - NAGA": {
                "7:00AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "12:00PM":{
                "FIRST CLASS" : ["450"]
                },
                "6:00PM":{
                "DELUXE":["630"],
                "SUPER DELUXE":["770"]
                }
            },

            "BATANGAS CITY - PASAY": {
                "8:30AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "11:00AM":{
                "FIRST CLASS" : ["250"]
                },
                "4:00PM":{
                "DELUXE":["350"]
                }
            },

            "BATANGAS CITY - STA.ROSA": {
                "1:30PM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "4:30PM":{
                "FIRST CLASS" : ["250"]
                },
                "8:30PM":{
                "DELUXE":["350"]
                }
            },
            
            "BATANGAS PIER - DASMARIÑAS": {
                "10:00AM":{
                "FIRST CLASS" : ["260"],
                "DELUXE" : ["360"]
                },
                "12:30PM":{
                "FIRST CLASS" : ["260"]
                },
                "4:00PM":{
                "DELUXE":["360"]
                }
            },    

            "BATANGAS PIER - LEGAZPI": {
                "8:00AM":{
                "FIRST CLASS" : ["500"],
                "DELUXE" : ["680"]
                },
                "1:00PM":{
                "FIRST CLASS" : ["500"]
                },
                "6:30PM":{
                "DELUXE":["680"],
                "SUPER DELUXE":["820"]
                }
            },  

            "BATANGAS PIER - NAGA": {
                "7:00AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "12:00PM":{
                "FIRST CLASS" : ["450"]
                },
                "6:00PM":{
                "DELUXE":["630"],
                "SUPER DELUXE":["770"]
                }
            },

            "BATANGAS PIER - PASAY": {
                "8:30AM":{
                "FIRST CLASS" : ["260"],
                "DELUXE" : ["360"]
                },
                "10:00AM":{
                "FIRST CLASS" : ["260"]
                },
                "3:00PM":{
                "DELUXE":["360"]
                }
            },

            "BATANGAS PIER - STA.ROSA": {
                "1:30PM":{
                "FIRST CLASS" : ["260"],
                "DELUXE" : ["360"]
                },
                "4:30PM":{
                "FIRST CLASS" : ["260"]
                },
                "8:30PM":{
                "DELUXE":["360"]
                }
            },

            "DASMARIÑAS - BATANGAS CITY": {
                "6:30AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "10:00AM":{
                "FIRST CLASS" : ["250"]
                },
                "2:00PM":{
                "DELUXE":["350"]
                }
            },

            "DASMARIÑAS - BATANGAS PIER": {
                "5:00AM":{
                "FIRST CLASS" : ["260"],
                "DELUXE" : ["360"]
                },
                "9:00AM":{
                "FIRST CLASS" : ["260"]
                },
                "1:00PM":{
                "DELUXE":["360"]
                }
            },

            "DASMARIÑAS - PASAY": {
                "8:00AM":{
                "FIRST CLASS" : ["200"],
                "DELUXE" : ["300"]
                },
                "12:00PM":{
                "FIRST CLASS" : ["200"]
                },
                "4:30PM":{
                "DELUXE":["300"]
                }
            },

            "DASMARIÑAS - STA.ROSA": {
                "11:00AM":{
                "FIRST CLASS" : ["200"],
                "DELUXE" : ["300"]
                },
                "3:00PM":{
                "FIRST CLASS" : ["200"]
                },
                "6:00PM":{
                "DELUXE":["300"]
                }
            },

            "LEGAZPI - BATANGAS CITY": {
                "8:30AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "2:00PM":{
                "FIRST CLASS" : ["450"]
                },
                "6:00PM":{
                "DELUXE":["630"],
                "SUPER DELUXE":["770"]
                }
            },

            "LEGAZPI - NAGA": {
                "7:00AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "11:00AM":{
                "FIRST CLASS" : ["250"]
                },
                "2:00PM":{
                "DELUXE":["350"]
                }
            },

            "LEGAZPI - PASAY": {
                "8:00AM":{
                "FIRST CLASS" : ["500"],
                "DELUXE" : ["680"]
                },
                "2:30PM":{
                "FIRST CLASS" : ["500"]
                },
                "6:30PM":{
                "DELUXE":["680"],
                "SUPER DELUXE":["820"]
                }
            },

            "LEGAZPI - STA.ROSA": {
                "9:00AM":{
                "FIRST CLASS" : ["500"],
                "DELUXE" : ["680"]
                },
                "4:30PM":{
                "FIRST CLASS" : ["500"]
                },
                "8:30PM":{
                "DELUXE":["680"],
                "SUPER DELUXE":["820"]
                }
            },

            "NAGA - BATANGAS CITY": {
                "9:00AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "2:30PM":{
                "FIRST CLASS" : ["450"]
                },
                "6:30PM":{
                "DELUXE":["630"],
                "SUPER DELUXE":["770"]
                }
            },

            "NAGA - LEGAZPI": {
                "7:00AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "10:30AM":{
                "FIRST CLASS" : ["250"]
                },
                "3:00PM":{
                "DELUXE":["350"]
                }
            },

            "NAGA - PASAY": {
                "9:00AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "6:00PM":{
                "FIRST CLASS" : ["450"],
                "SUPER DELUXE":["770"]
                },
                "8:00PM":{
                "DELUXE":["630"],
                }
            },

            "NAGA - STA.ROSA": {
                "8:00AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "12:00PM":{
                "FIRST CLASS" : ["450"]
                },
                "4:00PM":{
                "DELUXE":["350"],
                "SUPER DELUXE":["770"]
                }
            },

            "STA.ROSA - BATANGAS CITY": {
                "9:00AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "3:30PM":{
                "FIRST CLASS" : ["250"]
                },
                "6:00PM":{
                "DELUXE":["350"],
                }
            },

            "STA.ROSA - BATANGAS PIER": {
                "7:00AM":{
                "FIRST CLASS" : ["250"],
                "DELUXE" : ["350"]
                },
                "1:30PM":{
                "FIRST CLASS" : ["250"]
                },
                "5:30PM":{
                "DELUXE":["350"],
                }
            },

            "STA.ROSA - DASMARIÑAS": {
                "11:00AM":{
                "FIRST CLASS" : ["190"],
                "DELUXE" : ["270"]
                },
                "6:30PM":{
                "FIRST CLASS" : ["190"]
                },
                "8:00PM":{
                "DELUXE":["270"],
                }
            },

            "STA.ROSA - LEGAZPI": {
                "6:00AM":{
                "FIRST CLASS" : ["500"],
                "DELUXE" : ["680"]
                },
                "1:00PM":{
                "FIRST CLASS" : ["500"]
                },
                "7:00PM":{
                "DELUXE":["680"],
                "SUPER DELUXE":["820"]
                }
            },

            "STA.ROSA - NAGA": {
                "8:00AM":{
                "FIRST CLASS" : ["450"],
                "DELUXE" : ["630"]
                },
                "2:00PM":{
                "FIRST CLASS" : ["450"]
                },
                "7:00PM":{
                "DELUXE":["630"],
                "SUPER DELUXE":["770"]
                }
            },

            "STA.ROSA - PASAY": {
                "7:00AM":{
                "FIRST CLASS" : ["200"],
                "DELUXE" : ["300"]
                },
                "10:30AM":{
                "FIRST CLASS" : ["200"]
                },
                "4:00PM":{
                "DELUXE":["300"],
                }
            },

        }
        }
        
        window.onload = function(){
            var locSel = document.getElementById("locSel")
            tripSel = document.getElementById("tripSel"),
            timeSel = document.getElementById("timeSel"),
            typeSel = document.getElementById("typeSel"),
            priceSel = document.getElementById("priceSel");

            for(var loc in tripObject){
                locSel.options[locSel.options.length] = new Option(loc, loc);
            }
        
            locSel.onchange = function(){
                tripSel.length = 1;
                timeSel.length = 1;
                typeSel.length = 1;
                priceSel.length = 1;
                if(this.selectedIndex < 1) return;
                for(var trip in tripObject[this.value]){
                    tripSel.options[tripSel.options.length] = new Option(trip, trip);
                }
            }
        
            locSel.onchange();
        
            tripSel.onchange = function(){
                timeSel.length = 1;
                typeSel.length = 1;
                priceSel.length = 1;
                if(this.selectedIndex < 1) return;
                var selectedLoc = locSel.value;
                var selectedTrip = tripSel.value;
                for (var time in tripObject[selectedLoc][selectedTrip]){
                    timeSel.options[timeSel.options.length] = new Option(time, time);
                }
            }
        
            tripSel.onchange();
        
            timeSel.onchange = function(){
                typeSel.length = 1;
                priceSel.length = 1;
                if(this.selectedIndex < 1) return;
                var selectedLoc = locSel.value;
                var selectedTrip = tripSel.value;
                var selectedTime = timeSel.value;
                for (var type in tripObject[selectedLoc][selectedTrip][selectedTime]){
                    typeSel.options[typeSel.options.length] = new Option(type, type);
            }
            }
             
            timeSel.onchange();
            
            typeSel.onchange = function(){
                priceSel.length = 1;
                var selectedLoc = locSel.value;
                var selectedTrip = tripSel.value;
                var selectedTime = timeSel.value;
                var selectedType = typeSel.value;
                var prices = tripObject[selectedLoc][selectedTrip][selectedTime][selectedType];
                for(var i = 0; i < prices.length; i++){
                    priceSel.options[priceSel.options.length] = new Option(prices[i], prices[i]);
                }
            }
        }
        
        </script>
   
    </html>