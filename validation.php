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

<?php
$_POST["username"];
$_POST["password"];

include "dbConfig.php";

$filteredUser=filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$filteredPass=filter_var($_POST["password"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

$query = "SELECT * FROM users WHERE `name` = '".$filteredUser."' AND `password` = '".$filteredPass."'";
$sqlResult = $mysqli->query( $query );
$num_results = $sqlResult->num_rows;
if($num_results > 0)
{
while($row = $sqlResult->fetch_assoc()){
   

if($row != null) {

    echo "<h1>You successfully logged in</h1>";
    extract($row);

    session_start();
    
    $_SESSION["username"] = $filteredUser;
    $_SESSION["password"] = $filteredPass;
    $_SESSION["isAdmin"] = $is_admin;
}
}
}
if(session_status() != PHP_SESSION_ACTIVE || $_SESSION == null)
{
    echo "<h1>Log in failed. Try again.</h1>";
    echo "<a href='login.php'>Log In</a>";
}
echo "</br><a href='index.php'>Home</a>";

?>