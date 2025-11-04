<?php
    //echo "Welcome to main !!";
    //Start Session
    session_start();

    //
    if(!isset($_SESSION['session_user_id'])){
        header('refresh:0;url=error403.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icons/market_main.png"/>
    <title>Home</title>
</head>
<body>
    <center class="head">
        <h1>Welcome to Market-App</h1>
        <br><b>User: </b><?php echo $_SESSION['session_user_fullname']?>
    </center>
    <a href="logout.php">Logout</a> ||
    <a href="list_users.php">List Users</a>
</body>
</html>