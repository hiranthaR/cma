<?php
require_once "../connection.php";

$ill_code = $_POST["ill_code"];
$title = $_POST["title"];
$description = $_POST["description"];

$query = "UPDATE illness SET title = '$title' , description = '$description' WHERE ill_code = $ill_code;";

if (mysqli_query($conn, $query)) echo 'successfully Updated '.$title.'!';
else echo "error!";
echo mysqli_error($conn);

mysqli_close($conn);

?>