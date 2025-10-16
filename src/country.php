<?php
    //Get database access
    require('../config/database.php');

    //Get form-data
    $name = $_POST['ncountry'];
    $abbrev = $_POST['abbrevcountry'];
    $code = $_POST['codecountry'];

    $check_email = "
        Select
            c.code
        from
            countries c
        where
            abrev= '$abbrev' or code = '$code'
        limit 1
    ";
    $res_check = pg_query($supa_conn,$check_email);
    if(pg_num_rows($res_check)> 0){
        echo "<script>alert('User already exists')</script>";
        header('refresh:0;url=signup.html');
    }
    else{
        //Create query to INSERT INTO
        $query = "INSERT INTO countries (name,abrev,code) 
        values ('$name','$abbrev','$code')";

        //Execute query
        $res = pg_query($supa_conn,$query);

        //Validate result
        if($res){
            //echo "User has been created successfully!!";
            echo "<script>alert('Success, Go to cities')</script>";
            header('refresh:0;url=region.php');
        }
        else{
            echo "<script>alert('User already exists')</script>";
            header('refresh:0;url=country.html');
        }
    }
?>