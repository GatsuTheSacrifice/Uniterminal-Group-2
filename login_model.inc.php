<?php

declare(strict_types=1);

function user_get(Object $pdo, String $Email){
    $query = "SELECT * FROM UsersNHistory WHERE Email = :Email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Email", $Email); 
    $stmt->execute();   

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

?>