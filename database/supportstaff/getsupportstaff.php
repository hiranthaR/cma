<?php
require_once '../../headers/session.php';
require_once "../connection.php";

$emp_no = $_POST['emp_no'];

$query = "SELECT * FROM employee INNER JOIN support_staff ON employee.emp_no = support_staff.emp_no WHERE employee.emp_no = $emp_no;";

$results = $conn->query($query);

if ($results->num_rows > 0) {

    $row = $results->fetch_assoc();
    $response = array('emp_no' => $row['emp_no'], 'username' => $row['username'], 'gender' => $row['gender'], 'address' => $row['address'], 'name' => $row['name'], 'telephone_no' => $row['telephone_no'], '	annual_salary' => $row['annual_salary']);

    echo json_encode($response);
}
mysqli_close($conn);

?>

