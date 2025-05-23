<?php

$localhost = 'localhost';
$user = 'root';
$password = '';
$database = 'lost_and_found';

try{
    $connection = new mysqli($localhost, $user, $password, $database);
   // echo 'Connected successfully';
}catch(mysqli_sql_exception $e){
 echo 'caught exception'. $e->getMessage();
}

// if(mysqli_error($connection)){
//     echo 'error';
// }else{
//     // echo 'connected';
// }

?>