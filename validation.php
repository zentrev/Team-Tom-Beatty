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

    echo "session set";
    extract($row);

    session_start();
    
    $_SESSION["username"] = $filteredUser;
    $_SESSION["password"] = $filteredPass;
    $_SESSION["isAdmin"] = $is_admin;
}
}
}
?>