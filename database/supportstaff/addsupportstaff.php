<?php
require_once "../connection.php";

$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$telephone = $_POST["telephone"];
$salary = $_POST["salary"];
$flag = 30;
$emp_no = 0;

$query = "INSERT INTO employee VALUES ($emp_no,'$username','$password' , '$name' , '$gender' , '$address' , $telephone , $flag)";

echo $query;

if (mysqli_query($conn, $query)) {
    $emp_no = mysqli_insert_id($conn);
    $query = "INSERT INTO support_staff VALUE ($emp_no,$salary)";
    if (mysqli_query($conn, $query)) {
        echo "Successfully added! $name";
    }
} else echo "error!";
echo mysqli_error($conn);

mysqli_close($conn);

?>