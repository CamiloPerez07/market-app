<?php
    //Start or continue
    session_start();

    session_destroy();
    
    header('refresh:0;url=../index.html');
?>