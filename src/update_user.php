<?php
    //Get database access
    require('../config/database.php');

    //Get form-data
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $user_id = $_POST['userId'];

    
    //update query
    $sql_update_user = "
    update users set
        firstname = '$f_name',
        lastname = '$l_name'
    where
        id = '$user_id'
    ";
    $result = pg_query($local_conn, $sql_update_user);

    if(!$result){
        die("Error: ".pg_last_error());
    }
    else{
        echo "<script>alert('User has been updated!')</script>";
        header('refresh:0;url=list_users.php');
    }
?>