<?php
$host = "localhost";
$username = "tomBeatty";
$db_password = "IAmTomBeatty";
$db_name = "tom_beatty"; 

$mysqli = new mysqli($host, $username, $db_password, $db_name);

if(mysqli_connect_errno()) {
    echo "Error: Could not connect to database.";
    exit;
}