<?php
    //Step 1. Get Database Connection
    require('../config/database.php');

    //Step 2. Get data or params
    $user_id = $_GET['userId'];

    //Step 3. Prepare Query
    $sql_delete_user = "
        delete from users where id = $user_id
    ";

    //Step 4. Execute query
    $result = pg_query($local_conn, $sql_delete_user);
    if(!$result){
        die("Error: ". pg_last_error());
    }
    else{
        echo "<script>alert('User has been deleted!')</script>";
        header('refresh:0;url=list_users.php');
    }
?>