<?php 
    if(session_status()){
        session_start();

        $_SESSION["isAdmin"] = false;


        session_unset();
        session_destroy();

        echo "<h1>Youve been signed off</h1>";
        echo "</br><a href='index.php'> Return Home</a>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style_sheets/dev.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>