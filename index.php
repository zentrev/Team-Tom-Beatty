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

        $page = "home";

        $CMS = new simpleCMS();      
        if(true)
        {
            $WriteType = filter_input(INPUT_GET, "write_type",FILTER_SANITIZE_STRING);
            if($WriteType != null)
            {
                $InsertName = filter_input(INPUT_GET, "insert_name",FILTER_SANITIZE_STRING);
                $Content = filter_input(INPUT_GET, "content",FILTER_SANITIZE_STRING);
                $order = filter_input(INPUT_GET, "order",FILTER_SANITIZE_STRING);

                $CMS->Write($mysqli, $page, $WriteType, $InsertName, $Content, $order);
            }
            $CMS->Display_admin();
        }
        $CMS->Display_admin();
        $addingPage = $page;
        //else
            
        $CMS->Display_public($page, $mysqli);

    ?>

</body>
</html>