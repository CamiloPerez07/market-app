<?php
    //Database connection
    $host     = "localhost";
    $user     = "postgres";
    $dbname   = "marketapp";
    $password = "unicesmag";
    $port     = "5432";

    $data_connection = "
        host=$host
        user=$user
        password=$password
        dbname=$dbname
        port=$port    
    ";
    $conn = pg_connect($data_connection);

    if(!$conn){
        echo "Error";
    }else{
        echo "Connection Succesfully..";
    }
?>