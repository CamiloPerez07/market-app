<?php
    //Get database access
    require('../config/database.php');

    //Get form-data
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $m_number = $_POST['mnumber'];
    $id_number = $_POST['idnumber'];
    $e_mail = $_POST['email'];
    $p_wd = $_POST['pwd'];

    $enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
    //Create query to INSERT INTO
    $query = "INSERT INTO users (firstname, lastname, mobile_number, ide_number, email, password) 
    values ('$f_name','$l_name','$m_number','$id_number','$e_mail','$enc_pass')";

    //Execute query
    $res = pg_query($conn,$query);

    //Validate result
    if($res){
        echo "User has been created successfully!!";
    }
    else{
        echo "Something Wrong....";
    }
?>