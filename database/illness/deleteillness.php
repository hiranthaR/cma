<?php
require_once "../connection.php";

$code = $_POST["ill_code"];


$query = "DELETE FROM illness WHERE ill_code=$code;";

if(mysqli_query($conn,$query))

mysqli_close($conn);

?>