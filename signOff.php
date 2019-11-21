<?php 
    if(session_status()){
        session_start();

        $_SESSION["isAdmin"] = false;


        session_unset();
        session_destroy();

        echo "Youve been signed off";
        echo "</br><a href='index.php'> Index</a>";
    }
?>