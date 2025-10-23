<?php
    require('../config/database.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
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
                            <a href='#'><img src='icons/refresh.png' width='20'></a>
                            <a href='#'><img src='icons/delete.png' width='20'></a>
                        </td>
                    </tr>";
            }
        ?>
        
    </table>
</body>
</html>