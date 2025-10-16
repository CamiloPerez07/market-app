<?php
    //Database connection to supabase
    $supa_host     = "aws-1-us-east-2.pooler.supabase.com";
    $supa_user     = "postgres.jpjbxzzccqopbevldsge";
    $supa_dbname   = "postgres";
    $supa_password = "unicesmag@@";
    $supa_port     = "6543";

    //Database connection to local    
    $local_host     = "localhost";
    $local_user     = "postgres";
    $local_dbname   = "marketapp";
    $local_password = "unicesmag";
    $local_port     = "5432";

    $supa_data_connection = "
        host=$supa_host
        user=$supa_user
        password=$supa_password
        dbname=$supa_dbname
        port=$supa_port    
    ";
    $local_data_connection = "
        host=$local_host
        user=$local_user
        password=$local_password
        dbname=$local_dbname
        port=$local_port    
    ";
    $supa_conn = pg_connect($supa_data_connection);
    $local_conn = pg_connect($local_data_connection);

    /*if(!$supa_conn){
        echo "Error";
    }else{
        echo "Connection Succesfully to Supabase..";
    }

    if(!$local_conn){
        echo "Error";
    }else{
        echo "<br />Connection Succesfully to my PC..";
    }*/
?>