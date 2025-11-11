<?php
    //Step 1. Get Database Connection
    require('../config/database.php');

    //Step 2. Get data or params
    $user_id = $_GET['userId'];

    $sql_get_user= "select * from users where id = $user_id";
    $result= pg_query($local_conn, $sql_get_user);

    if(!$result){
        die("Error: ". pg_last_error());
    }

    while($row = pg_fetch_assoc($result)){
        $f_name = $row['firstname'];
        $l_name = $row['lastname'];
        $id_number = $row['ide_number'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
</head>
<body align = "center">
    <h1>Edit User</h1>
    <form name="edit-user-form" method = "post" action="update_user.php">
        <label>User</label>
        <input 
            type="hidden" 
            name= "userId" 
            value="<?php echo $user_id?>"
            readonly
            required/> <br><br>
        <label>Photo</label>
        <input type="file"
            name="photo user"
            ><br><br>
        <label>Firstname</label>
        <input type="text" 
            name= "fname" 
            value="<?php echo $f_name?>"
            required/> <br><br>
        <label>Lastname</label>
        <input type="text" 
            name= "lname" 
            value="<?php echo $l_name?>"
            required/>
        <br><br>
        <label>Id number</label>
        <input type="text" 
            name= "idnumber" 
            value="<?php echo $id_number?>"
            readonly
            required/> <br> <br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>