<?php
    //Get database access
    require('../config/database.php');

    //Get form-data
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $m_number = $_POST['mnumber'];
    $id_number = $_POST['idnumber'];
    $e_mail = strtolower(trim($_POST['email']));
    $p_wd = trim($_POST['pwd']);

    #$enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
    $enc_pass = md5($p_wd);

    $check_email = "
        Select
            u.email
        from
            users u
        where
            email= '$e_mail' or ide_number = '$id_number'
        limit 1
    ";
    $res_check = pg_query($conn,$check_email);
    if(pg_num_rows($res_check)> 0){
        echo "<script>alert('User already exists')</script>";
        header('refresh:0;url=signup.html');
    }
    else{
        //Create query to INSERT INTO
        $query = "INSERT INTO users (firstname, lastname, mobile_number, ide_number, email, password) 
        values ('$f_name','$l_name','$m_number','$id_number','$e_mail','$enc_pass')";

        //Execute query
        $res = pg_query($conn,$query);

        //Validate result
        if($res){
            //echo "User has been created successfully!!";
            echo "<script>alert('Success, Go to login')</script>";
            header('refresh:0;url=signin.html');
        }
        else{
            echo "<script>alert('User already exists')</script>";
            header('refresh:0;url=signup.html');
        }
    }
?>