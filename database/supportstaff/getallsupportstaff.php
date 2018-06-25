<?php
require_once '../../headers/session.php';
require_once "../connection.php";

$user_level_support_staff = 30;

$query = "SELECT * FROM employee WHERE flag=$user_level_support_staff;";

$results = $conn->query($query);

if ($results->num_rows > 0) {
    echo "<table style='width: 100%' id='table-support-staff'>";
    echo "<tr>";
    echo "<th style='width: 15%'>Employee Number</th>";
    echo "<th style='width: 75%'>Name</th>";
    echo "</tr>";

    while ($row = $results->fetch_assoc()) {
        echo "<tr><td class='emp-no'>" . $row["emp_no"] . "</td><td class='name'>" . $row["name"] . "</td></tr>";
    }

    echo "</table>";
}
mysqli_close($conn);

?>

<!--<td width='5%'><button type='button' class='btn btn-info btn-edit' data-id='".$row['ill_code']."' style='margin: auto'>Edit</button></td><td width='5%'><button type='button' class='btn btn-danger btn-delete' data-id='".$row['ill_code']."' style='margin: auto'>Delete</button></td>-->