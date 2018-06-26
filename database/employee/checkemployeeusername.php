<?php
require_once "../connection.php";

$username = $_POST['username'];

$query = "SELECT * FROM employee WHERE username='$username';";

$results = $conn->query($query);

if ($results->num_rows > 0) {

    echo "$username already taken.Try another one.<br>";
}

mysqli_close($conn);