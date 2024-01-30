<?php
    require_once 'connection.inc.php';
    require_once 'signup_model.inc.php';
    
        $host = "localhost";
        $username = "root";
        $password = "KellyPielago0904_";
        $dbname = "Uniterminal";
        $connection = new mysqli($host, $username, $password, $dbname);
        if(mysqli_connect_error()){
            die('Connect Error('. mysqli_connect(). ')'. mysqli_connect_error());
        }
        

        $First_Name = $_POST["First_Name"];
        $Last_Name = $_POST["Last_Name"];
        $Age = $_POST["Age"];
        $Gender = $_POST["Gender"];
        $Contact_Number = $_POST["Contact_Number"];
        $Email_Address = $_POST["Email_Address"];
        $Location = $_POST["Location"];
        $Trip = $_POST["Trip"];
        $Departure_Time = $_POST["Departure_Time"];
        $Bus_Type = $_POST["Bus_Type"];
        $Price = $_POST["Price"];
        $Ref_Num = $_POST["Ref_Num"];

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $Email = isset($_POST['Email']) ? $_POST['Email'] : $Email_Address;
        $Pass = isset($_POST['Pass']) ? $_POST['Pass'] : 'Input History';
        $getUserID = set_user($pdo, $Email, $Pass);
        
            function generateRandomNumberWithLetters($length) {
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $result = '';
            
                for ($i = 0; $i < $length; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $result .= $characters[$index];
                }
            
                return $result;
            }
            $Passenger_ID = generateRandomNumberWithLetters(5);

            $INSERT = "INSERT INTO Passengers(Passenger_ID, First_Name, Last_Name, Age, Gender, Contact_Number, Email_Address, User_ID) VALUES(?,?,?,?,?,?,?,?)";
                $stmt = $connection->prepare($INSERT);
                $stmt->bind_param("sssisisi", $Passenger_ID, $First_Name, $Last_Name, $Age, $Gender, $Contact_Number, $Email_Address, $getUserID);
                $stmt->execute();
    
                
                if($Trip === "PASAY - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM"){ 
                $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UHU 1903'";
                $result = $connection->query($sourceTable1);
                if ($result->num_rows > 0) {
                    $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                }
                } else if($Trip === "PASAY - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00PM"){ 
                $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'EQP 7819'";
                $result = $connection->query($sourceTable1);
                if ($result->num_rows > 0) {
                    $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                }
                } else if($Trip === "PASAY - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:30PM"){ 
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VLR 9147'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM"){ 
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'NDF 7645'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }else if($Trip === "PASAY - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM"){ 
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ZSP 4732'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }else if($Trip === "PASAY - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "9:30PM"){ 
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DNO 3329'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BAGUIO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00PM"){ 
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'ABY 5731'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 
                
                if($Trip === "PASAY - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'NWX 4187'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BANGUED" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'MQF 2756'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:15PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WKL 3819'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "2:15PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JVT 4961'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if ($Trip === "PASAY - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'QDX 3274'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if ($Trip === "PASAY - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'YPQ 5392'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'EJQ 6847'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'WQN 7804'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'CSY 5827'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JSH 6837'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CABUGAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'XHF 8392'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RKG 7123'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'THG 9214'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CABUGAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'NDK 7364'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 

                if($Trip === "PASAY - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZVI 8536'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LBV 9639'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DSB 6325'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CANDON" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'FPM 8456'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BFT 2345'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'HNU 5247'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PSZ 7952'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LPF 2381'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UJF 2458'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'KZV 9183'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LAOAG" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'TDC 2286'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HMC 7916'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LTR 9265'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LAOAG" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'AOA 7890'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LAP 5163'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHO 5691'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LA UNION" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'LKF 6729'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SJD 0415'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'YZN 7832'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SPA 0158'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'CQT 7692'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LA UNION" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'TDC 2216'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SMQ 1852'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GRA 1513'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JDA 5712'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GRS 5124'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'VGB 9142'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DAH 6424'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 1235'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - PAGUDPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'JMP 5738'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }
                
                if($Trip === "PASAY - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KSA 5124'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 5678'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JSA 9512'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 9876'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SAD 5812'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 4321'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'WFP 3901'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NSA 1512'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 8765'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LSA 6315'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 2468'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BAS 5152'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 1357'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - VIGAN" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'GHD 9523'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NHT 3946'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 9876'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GKL 8210'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 5432'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'IEJ 6902'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 2109'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - BANGUED" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'LKC 7164'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'MFO 4823'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 4567'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HXV 5794'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 3210'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZUD 1836'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 6543'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CABUGAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'BXN 8415'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BWK 9051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 7890'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'FDQ 3672'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 4321'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LXM 7428'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 5625'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UPV 4563'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 8901'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RNC 1247'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 2345'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JTE 5709'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 6709'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LAOAG" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'QEZ 4672'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DIB 8195'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 1234'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XAV 4061'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 8765'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YLV 5908'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 4321'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KVD 9574'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 3532'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'OQW 2385'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 3456'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00APM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'AHI 6139'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 2109'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PAGUDPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'FKR 1239'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'CJM 1950'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 5670'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UOB 8416'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 4321'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7890'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'NPA 6957'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PKX 3674'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 3456'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RNS 5048'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 8901'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'TLF 1965'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 1234'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'RJD 8104'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BAGUIO - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZPY 8350'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 6789'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XWO 1429'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 3452'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NBM 6791'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 9012'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BAGUIO - VIGAN" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'HMV 2548'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                 if($Trip === "BANGUED - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GJU 3154'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 4567'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'EKU 4892'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 2109'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'AQC 7506'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 5678'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - BAGUIO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'TPC 6391'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BANGUED - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VQC 1834'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 4321'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XTV 4963'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DRX 1085'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 7890'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BANGUED - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SBW 8723'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 1233'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'MNB 6937'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'CWI 5401'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 5678'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                 if($Trip === "BANGUED - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'OPJ 4518'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9012'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XKK 7932'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 3456'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PKV 6084'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 6789'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LAOAG" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'YKQ 7215'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 

                if($Trip === "BANGUED - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZVB 8706'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1234'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UPL 1459'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 5678'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VLC 6924'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 9012'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - LA UNION" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'CLX 5893'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                  if($Trip === "BANGUED - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RUO 3075'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 3456'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - PAGUDPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'VXH 3046'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }  else if($Trip === "BANGUED - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GHI 3456'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }  else if($Trip === "BANGUED - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 6789'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BANGUED - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WYG 4612'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 1235'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RZA 2085'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'SGR 1785'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KZH 9734'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5679'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BANGUED - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DFE 2674'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9019'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SVO 8451'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3456'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'FIRST CLASS' AND Plate_Number = 'EQP 7810'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7898'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'DKY 9467'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BANGUED - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BFT 2346'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2347'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6787'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BANGUED - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PSZ 7951'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }else if($Trip === "BANGUED - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1236'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CABUGAO - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'CSY 5826'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HMC 7911'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5677'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9152'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }  else if($Trip === "CABUGAO - BAGUIO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'UJN 4512'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                 if($Trip === "CABUGAO - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RNP 4021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3457'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:15PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LKD 6831'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }else if($Trip === "CABUGAO - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7800'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }
                
                if($Trip === "CABUGAO - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VZP 1941'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2346'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PGX 8762'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6786'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CABUGAO - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WGF 3021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1233'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'THZ 5761'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }  else if($Trip === "CABUGAO - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5676'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CABUGAO - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KXT 3892'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9032'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3455'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - LA UNION" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'PLQ 8039'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7897'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CABUGAO - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UKN 9151'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2345'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'FCD 7231'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PAGUDPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'IRO 2675'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CABUGAO - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'OYR 8361'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6785'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DJP 4691'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'EAS 9158'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'MVR 5102'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1231'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CABUGAO - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'QYD 8241'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9152'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZPW 3071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'QMD 6824'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LXC 6101'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CABUGAO - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3457'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XVR 8032'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7800'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HJK 9641'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2346'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NMS 7821'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6786'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'QBD 1531'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1233'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RHY 2901'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5676'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BGP 6311'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9032'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GXY 9422'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3455'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZTD 8071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7897'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - LAOAG" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'XGN 3489'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UCM 5181'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2345'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JBN 6891'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6785'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LPT 4651'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1231'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5675'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 6012'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PAGUDPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'AZR 7941'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VKR 3821'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3454'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YLP 7091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7896'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2344'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'TYU 1637'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DSV 5411'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6784'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1235'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WVD 8461'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'HBO 7264'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "CANDON - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XUD 1071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5674'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HPT 6351'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 5112'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "CANDON - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3453'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'IWX 9201'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'EQV 5711'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7895'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2343'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YXT 4691'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6783'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SGR 8232'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1238'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5673'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - BAGUIO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'CVW 5891'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }
                
                if($Trip === "LAOAG - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'OLZ 1981'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZBM 3151'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9072'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3452'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZBM 3151'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7894'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KSP 7841'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2342'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - CANDON" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'ULK 3018'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WKS 3921'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6782'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "LAOAG - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'THP 6481'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1232'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "LAOAG - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RJL 5091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - LA UNION" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'RZH 9745'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NYK 3611'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5672'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VPZ 9421'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9112'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BQK 8151'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3451'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BQK 8152'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7891'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LMX 2071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'FQI 6382'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JHT 9461'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 2341'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6781'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RNY 5831'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'XVS 4071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LAOAG - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UVZ 3022'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GSC 4611'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 1230'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LAOAG - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5671'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WPQ 1292'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 9002'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YIX 7481'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 7002'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BAGUIO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'WBD 2956'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KOB 6051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 5011'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VFD 1971'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 3021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - BANGUED" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'KCL 8419'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NMR 8301'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 4091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DLT 6041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 6021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CABUGAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'NRF 7063'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HZX 3151'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 7081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 3051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'AEK 4911'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - CANDON" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'JEL 4718'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PSD 7291'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 8092'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 1041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RCU 8601'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LJP 2451'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 7081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30pM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 2051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - LA UNION" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "1:30pM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'DIO 8294'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YHT 9071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VKO 1481'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "5:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 8041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 5032'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "PAGUDPUD - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'IXR 3651'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'MSP 5023'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'FHY 6721'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 1021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "9:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 70611'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "PAGUDPUD - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'OQE 1841'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'QTF 1756'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PAGUDPUD - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BVP 5491'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 3091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 6042'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - VIGAN" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'ULK 3469'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PAGUDPUD - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'CGP 9131'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "TUGUEGARAO - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UWE 2871'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 4081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'SKZ 4011'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - BAGUIO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'ZMD 9182'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "TUGUEGARAO - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7011'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 

                if($Trip === "TUGUEGARAO - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XZL 5781'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 9051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - BANGUED" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'AHV 6845'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "TUGUEGARAO - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JRU 9541'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 1031'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 

                if($Trip === "TUGUEGARAO - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YCX 7022'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 4081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - BANGUED" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'XOK 1379'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "TUGUEGARAO - CABUGAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HSM 8351'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - CABUGAO" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 6051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "TUGUEGARAO - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NUZ 4611'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 9011'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - CANDON" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'QFG 9056'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "TUGUEGARAO - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VZY 7031'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 5041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "TUGUEGARAO - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KBC 2981'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 6071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LAOAG" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'VRF 5721'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DWM 6141'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LAOAG" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 2031'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "TUGUEGARAO - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JPA 9571'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 9042'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LAOAG" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'KHN 2193'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RFG 3611'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 3051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "TUGUEGARAO - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XWU 5021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 7041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - PAGUPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'MFK 8037'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "TUGUEGARAO - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'QRT 7081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 5011'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "TUGUEGARAO - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'TLO 9562'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 8021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'BES 4685'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "TUGUEGARAO - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HKL 3071'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 3091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "TUGUEGARAO - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GNI 4951'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 4081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - VIGAN" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'YGR 3612'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "TUGUEGARAO - VIGAN" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UQD 2081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "TUGUEGARAO - VIGAN" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 6021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YZF 6471'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 1051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - BAGUIO" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 4031'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }  if($Trip === "VIGAN - BAGUIO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VOE 8541'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - BAGUIO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'DUO 8245'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WUJ 4091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 7011'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - BANGUED" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 6051'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - BANGUED" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PEX 7131'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XIT 5861'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 3041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 5061'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - CANDON" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KVR 2952'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'AHB 9481'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 7022'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - CANDON" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 1081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "VIGAN - LAOAG" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YKD 5321'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LZM 1761'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 2041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - LA UNION" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 3062'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "VIGAN - LA UNION" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'QVG 4791'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'TJD 6951'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 9021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - PAGUDPUD" && $Bus_Type === "DELUXE" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 5041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "VIGAN - PAGUDPUD" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WFX 8241'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - PAGUDPUD" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'LWO 4973'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DRI 6028'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 0121'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 4562'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WJY 8354'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'LMN 8903'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "VIGAN - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KIP 3671'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 6091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } if($Trip === "VIGAN - TUGUEGARAO" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GHO 2151'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - TUGUEGARAO" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 2451'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "VIGAN - TUGUEGARAO" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'PLX 5824'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BRN 6091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 8121'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DQK 7511'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 7631'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - BATANGAS PIER" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XCP 4921'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BATANGAS PIER" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 9301'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BATANGAS PIER" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'FRL 3651'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - BATANGAS PIER" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 4711'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VOT 9181'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 5821'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JSM 6041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'EXL 3571'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YHF 4901'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'VWX 3641'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'MZI 6232'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 1971'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - LEGAZPI" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'MKT 1936'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UQD 7841'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 8251'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PFB 9021'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'QRS 5031'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - NAGA" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'KPR 6475'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "PASAY - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NVC 1561'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'NOP 6841'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RKT 4691'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "PASAY - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'YZA 1791'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS CITY - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'IOC 5841'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'BCD 2961'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XZK 3708'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 4591'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS CITY - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LCY 5196'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - LEGZAPI" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 8322'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VND 6475'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - LEGZAPI" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 6171'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - LEGZAPI" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'BHG 8152'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS CITY - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'AEM 3187'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'VWX 5401'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HJU 9654'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 3821'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - NAGA" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'UJX 3649'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS CITY - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YQO 1046'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 7651'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'CIF 2087'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 4931'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 

                if($Trip === "BATANGAS CITY - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DLR 7569'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'YZA 6782'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BES 1398'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS CITY - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'QRS 9241'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS PIER - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'WKP 4732'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'NOP 3561'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'MJX 6954'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 1082'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS PIER - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'TSL 8204'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 5261'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'OUB 1845'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'YZA 2091'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - LEGAZPI" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'YWP 2901'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS PIER - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZVY 3561'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 7141'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JYE 5079'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 3501'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - NAGA" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'QSD 1582'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS PIER - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NGH 9832'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'BCD 8692'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ILW 6497'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'NOP 7421'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "BATANGAS PIER - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'QRV 3057'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 6311'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YUS 4082'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "BATANGAS PIER - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 9081'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "DASMARIÑAS - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'EIR 7401'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 2451'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XJO 5294'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'VWX 4702'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "DASMARIÑAS - BATANGAS PIER" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "5:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BDP 8652'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - BATANGAS PIER" && $Bus_Type === "DELUXE" && $Departure_Time === "5:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 1931'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - BATANGAS PIER" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'APU 9425'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - BATANGAS PIER" && $Bus_Type === "DELUXE" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 5821'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "DASMARIÑAS - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GJF 6018'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'PQR 7491'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UKY 2673'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 8651'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "DASMARIÑAS- STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LXD 4381'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 3201'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NLM 5732'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "DASMARIÑAS - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 9672'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LEGAZPI - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GYR 8961'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'VWX 5841'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'BWH 3410'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'QRS 2171'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - BATANGAS CITY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'XEH 4703'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LEGAZPI - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XJP 4529'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'NOP 3901'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RZQ 6984'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 8151'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 

                if($Trip === "LEGAZPI - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VJN 3170'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'STU 6741'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'THK 6957'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 4561'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'VRF 6925'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "LEGAZPI - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'UHC 1845'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 9311'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "4:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'JIP 9362'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 6751'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "LEGAZPI - STA.ROSA" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "8:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'NTG 3174'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "NAGA - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KOT 4873'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 3821'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LCX 5714'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 5041'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - BATANGAS CITY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'ZMY 8061'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "NAGA - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'PDB 6908'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'QRS 7862'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NMS 8246'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "3:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'WXY 1231'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "NAGA - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'DXE 1095'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'LMN 5671'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'OPV 2567'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }else if($Trip === "NAGA - PASAY" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'FJO 5492'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'UVW 9011'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "NAGA - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'QYC 7534'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 3451'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - STA.ROSA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "12:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'FJV 4182'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - STA.ROSA" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 7891'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "NAGA - STA.ROSA" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'DUE 6314'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "STA.ROSA - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'AOR 9651'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "9:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'DEF 2341'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - BATANGAS CITY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "3:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'ZNU 6428'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - BATANGAS CITY" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'OPQ 6781'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 

                if($Trip === "STA.ROSA - BATANGAS PIER" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'GKB 7319'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - BATANGAS PIER" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 0122'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - BATANGAS PIER" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'XMD 5043'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - BATANGAS PIER" && $Bus_Type === "DELUXE" && $Departure_Time === "5:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 4563'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "STA.ROSA - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'VZO 8106'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "11:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'IJK 8904'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - DASMARIÑAS" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:30PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'KSW 3897'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - DASMARIÑAS" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'XYZ 3455'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "STA.ROSA - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LQD 2764'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "6:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'QRS 7896'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - LEGAZPI" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "1:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'YVA 5401'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - LEGAZPI" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'ABC 1237'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - NAGA" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'RQL 7435'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "STA.ROSA - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'HZI 1673'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "8:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'MNO 5679'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - NAGA" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "2:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'RUY 8025'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - NAGA" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'TUV 9018'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - NAGA" && $Bus_Type === "SUPER DELUXE" && $Departure_Time === "7:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Super Deluxe' AND Plate_Number = 'CAX 9056'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                }

                if($Trip === "STA.ROSA - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'NCF 7134'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "7:00AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'GHI 2341'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - PASAY" && $Bus_Type === "FIRST CLASS" && $Departure_Time === "10:30AM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'First Class' AND Plate_Number = 'LGT 4692'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } else if($Trip === "STA.ROSA - PASAY" && $Bus_Type === "DELUXE" && $Departure_Time === "4:00PM" ){
                    $sourceTable1 = "SELECT Bus_ID FROM Buses WHERE Bus_Type = 'Deluxe' AND Plate_Number = 'JKL 6781'";
                    $result = $connection->query($sourceTable1);
                    if ($result->num_rows > 0) {
                        $BusKeyValue = $result->fetch_assoc()['Bus_ID'];
                    }
                } 
                




                if($Trip === "PASAY - BAGUIO"){
                $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-BGO'";
                $result = $connection->query($tripTable1);
                if ($result->num_rows > 0) {
                    $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                    }
                } else if($Trip === "PASAY - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                } else if($Trip === "PASAY - CABUGAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-CBG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                } else if($Trip === "PASAY - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                } else if($Trip === "PASAY - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                } else if($Trip === "PASAY - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                } else if($Trip === "PASAY - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                } else if($Trip === "PASAY - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                } else if($Trip === "PASAY - VIGAN"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-VGN'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }     
                }

                if($Trip === "BAGUIO - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "BAGUIO - CABUGAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-CBG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }      
                } else if($Trip === "BAGUIO - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "BAGUIO - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BAGUIO - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BAGUIO - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BAGUIO - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BAGUIO - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BAGUIO - VIGAN"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BGO-VGN'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                if($Trip === "BANGUED - BAGUIO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-BGO'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "BANGUED - CABUGAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-CBG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BANGUED - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BANGUED - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BANGUED - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BANGUED - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BANGUED - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BANGUED - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BANGUED - VIGAN"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BND-VGN'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                if($Trip === "CABUGAO - BAGUIO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-BGO'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "CABUGAO - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CABUGAO - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CABUGAO - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CABUGAO - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CABUGAO - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CABUGAO - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CABUGAO - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CBG-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "CANDON - BAGUIO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-BGO'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "CANDON - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CANDON - CABUGAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-CBG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CANDON - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CANDON - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "CANDON - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "CANDON - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "CANDON - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "CANDON - VIGAN"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'CND-VGN'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }
                
                if($Trip === "LAOAG - BAGUIO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-BGO'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "LAOAG - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "LAOAG - CABUGAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-CBG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "LAOAG - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "LAOAG - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "LAOAG - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "LAOAG - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "LAOAG - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "LAOAG - VIGAN"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LOG-VGN'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "PAGUDPUD - BAGUIO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-BGO'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PAGUDPUD - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PAGUDPUD - CABUGAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-CBG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "PAGUDPUD - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PAGUDPUD - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PAGUDPUD - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PAGUDPUD - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PAGUDPUD - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "PAGUDPUD - VIGAN"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PGP-VGN'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "TUGUEGARAO - BAGUIO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-BGO'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "TUGUEGARAO - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "TUGUEGARAO - CABUGAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-CBG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "TUGUEGARAO - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "TUGUEGARAO - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "TUGUEGARAO - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "TUGUEGARAO - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "TUGUEGARAO - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "TUGUEGARAO - VIGAN"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'TGR-VGN'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "VIGAN - BAGUIO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-BGO'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "VIGAN - BANGUED"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-BND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "VIGAN - CANDON"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-CND'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "VIGAN - LAOAG"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-LOG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "VIGAN - LA UNION"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-ELU'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "VIGAN - PAGUDPUD"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-PGP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "VIGAN - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "VIGAN - TUGUEGARAO"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'VGN-TGR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "PASAY - BATANGAS CITY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-BTC'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PASAY - BATANGAS PIER"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-BTP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }
                else if($Trip === "PASAY - DASMARIÑAS"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-DSM'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PASAY - LEGAZPI"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-LGZ'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PASAY - NAGA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-NAG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "PASAY - STA.ROSA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'PSY-STR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "BATANGAS CITY - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTC-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS CITY - DASMARIÑAS"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTC-DSM'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS CITY - STA.ROSA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTC-STR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS CITY - NAGA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTC-NAG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS CITY - LEGAZPI"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTC-LGZ'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "BATANGAS PIER - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTP-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS PIER - DASMARIÑAS"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTP-DSM'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS PIER - STA.ROSA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTP-STR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS PIER - NAGA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTP-NAG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "BATANGAS PIER - LEGAZPI"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'BTP-LGZ'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "DASMARIÑAS - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'DSM-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "DASMARIÑAS - STA.ROSA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'DSM-STR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "DASMARIÑAS - BATANGAS CITY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'DSM-BTC'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "DASMARIÑAS - BATANGAS PIER"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'DSM-BTP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "LEGAZPI - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LGZ-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "LEGAZPI - STA.ROSA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LGZ-STR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "LEGAZPI - BATANGAS CITY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LGZ-BTC'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "LEGAZPI - NAGA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'LGZ-NAG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "NAGA - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'NAG-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                } else if($Trip === "NAGA - STA.ROSA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'NAG-STR'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "NAGA - BATANGAS CITY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'NAG-BTC'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "NAGA - LEGAZPI"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'NAG-LGZ'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                 if($Trip === "STA.ROSA - PASAY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'STR-PSY'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "STA.ROSA - DASMARIÑAS"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'STR-DSM'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "STA.ROSA - BATANGAS CITY"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'STR-BTC'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "STA.ROSA - BATANGAS PIER"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'STR-BTP'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "STA.ROSA - NAGA"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'STR-NAG'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }else if($Trip === "STA.ROSA - LEGAZPI"){
                    $tripTable1 = "SELECT Trip_ID FROM trip WHERE Trip_ID = 'STR-LGZ'";
                    $result = $connection->query($tripTable1);
                    if ($result->num_rows > 0) {
                        $TripKeyValue = $result->fetch_assoc()['Trip_ID'];
                        }
                }

                $Booking_ID = generateRandomNumberWithLetters(5);
                $Trip_Date = $_POST["Trip_Date"];
                $INSERT_BOOKING = "INSERT INTO Booking(Booking_ID, Travel_Date, Price, Passenger_ID, Bus_ID, Trip_ID) VALUES(?,?,?,?,?,?)";
                $stmt_booking = $connection->prepare($INSERT_BOOKING);
                $stmt_booking->bind_param("ssisss", $Booking_ID, $Trip_Date, $Price, $Passenger_ID, $BusKeyValue, $TripKeyValue);
                $stmt_booking->execute();
                
                $Payment_ID = generateRandomNumberWithLetters(5);
                $INSERT_PAYMENTS = "INSERT INTO Payments(Payment_ID, Ref_Number, Booking_ID) VALUES(?,?,?)";
                $stmt_payments = $connection->prepare($INSERT_PAYMENTS);
                $stmt_payments->bind_param("sss", $Payment_ID, $Ref_Num, $Booking_ID);
                $stmt_payments->execute();
               

                $Ticket_ID = generateRandomNumberWithLetters(5);

                $INSERT_TICKETS = "INSERT INTO Reservation_Ticket(Ticket_ID, Passenger_ID, Bus_ID, Trip_ID, Booking_ID, Payment_ID) VALUES(?,?,?,?,?,?)";
                $stmt_tickets = $connection->prepare($INSERT_TICKETS);
                $stmt_tickets->bind_param("ssssss", $Ticket_ID, $Passenger_ID, $BusKeyValue, $TripKeyValue, $Booking_ID, $Payment_ID);
                $stmt_tickets->execute();
                
                $stmt->close();
                $stmt_booking->close();
                $connection->close();
                header("Location: home_logged1.php");
                $stmt->close();
                $connection->close();

            
            
?>