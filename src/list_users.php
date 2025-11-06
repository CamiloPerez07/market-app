<?php
    require('../config/database.php');
    
    session_start();

    //
    if(!isset($_SESSION['session_user_id'])){
        header('refresh:0;url=error403.html');
    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <table border="1" class="table table-hover">
        <tr class="table-dark">
            <th>Fullname</th>
            <th>E-mail</th>
            <th>ID number</th>
            <th>Phone number</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        <?php
            $sql_users="
                select
                    u.id as user_id,
	                u.firstname || ' ' || u.lastname as fullname,
	                u.email,
	                u.ide_number,
                    u.mobile_number,
	                case 
                        when u.status = true then 'Active' else 'Inactive' 
                    end as status
	            from 
                    users u
            ";
            $result = pg_query($local_conn, $sql_users);
            if(!$result){
                die("Error: ". pg_last_error());
            }
            while($row = pg_fetch_assoc($result)){
                echo"
                    <tr>
                        <td>" . $row['fullname'] ."</td>
                        <td>" . $row['email'] ."</td>
                        <td>" . $row['ide_number'] ."</td>
                        <td>" . $row['mobile_number'] ."</td>
                        <td>" . $row['status'] ."</td>
                        <td>
                            <a href='#'><img src='icons/search.png' width='20'></a>
                            <a href='delete_users.php?userId=". $row['user_id'] ."'><img src='icons/delete.png' width='20'></a>
                            <a href='edit_user_form.php?userId=". $row['user_id'] ."'><img src='icons/edit.png' width='20'></a>
                        </td>
                    </tr>";
            }
        ?>
        
    </table>
</body>
</html>