<?php 

$servername = "sql211.epizy.com";
$username = "epiz_24212766";
$password = "2FqxB1yDbCb2";
$dbname = "epiz_24212766_completegameassets";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>