<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        include "dbConfig.php";
        require_once "CMS.php"; 
        $CMS = new simpleCMS();      
        $CMS->Connect("home", $mysqli); // to route
        //if admin
        //Display_admin();
        //else
        $CMS->Display_public();
    ?>

</body>
</html>