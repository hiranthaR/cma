<?php
require_once "../connection.php";

$title = $_POST["title"];
$description = $_POST["description"];

$query = "INSERT INTO illness VALUES (0,'$title','$description');";

if (mysqli_query($conn, $query)) echo 'successfully added '.$title.'!';
else echo "error!";
echo mysqli_error($conn);

mysqli_close($conn);

?>