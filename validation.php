<?php
$_POST["username"];
$_POST["password"];

include "dbConfig.php";

$filteredUser=filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$filteredPass=filter_var($_POST["password"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

$query = "SELECT * FROM users WHERE 'name' like $filteredUser WHERE 'password' like $filteredPass";
$sqlResult = $mysqli->query( $query );
$rows = array();
while($r = mysqli_fetch_assoc($sqlResult))
{
    $rows[] = $r;
}
if($rows != null) {

    echo "session set";
    session_start();
    $_SESSION["username"] = $filteredUser;
    $_SESSION["password"] = $filteredPass;
}
?>