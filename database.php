<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_club";
$conn = "";
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception) {
    echo "could not connect";
}

?>