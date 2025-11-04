<?php
    //Get database connection
    require('../config/database.php');

    //Start Session
    session_start();

    if(isset($_SESSION['session_user_id'])){
        header('refresh:0;url=main.php');
    }

    //Get form-data
    $e_mail = strtolower(trim($_POST['email']));
    $p_wd = trim($_POST['pwd']);

    #$enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
    $enc_pass = md5($p_wd);

    //Query to validate data
    $sql_check_user = "
    select 
	    u.id,
        u.firstname || ' ' || u.lastname as fullname,
        u.email,
        u.password 
    from 
	    users u
    where 
	    u.email = '$e_mail' and
	    u.password = '$enc_pass'
        limit 1
    ";

    //Execute query
    $res_check = pg_query($local_conn,$sql_check_user);

    $row = pg_fetch_assoc($res_check);
    $_SESSION['session_user_id'] = $row['id'];
    $_SESSION['session_user_fullname'] = $row['fullname'];

    if(pg_num_rows($res_check)>0){
        echo "<script>alert('Success Login')</script>";
        header('refresh:0;url=main.php');
    } else {
        echo "Verify data..";
    }