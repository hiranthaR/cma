<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123";
$db = 'sma_db';

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    echo mysqli_connect_error();
}

