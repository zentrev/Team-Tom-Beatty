
<?php
echo "<a href='index.php'>Back</a>";
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
    
    <form class="forms" action="validation.php" method="post">
    Username:<br>
    <input type="text" name="username">
    <br>
    Password:<br>
    <input type="text" name="password">
    <br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>