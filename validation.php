<?php
$_POST["username"];
$_POST["password"];

include "dbConfig.php";

$query = "SELECT * FROM users WHERE 'name' like $_POST["username"] WHERE 'password' like $_POST["password"]";
$sqlResult = $mysqli->query( $query );
$rows = array();
while($r = mysqli_fetch_assoc($sqlResult))
{
    $rows[] = $r;
}
if($rows != null) {
    session_start();
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
}
?>