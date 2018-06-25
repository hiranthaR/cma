<?php
require_once "../connection.php";

$pattern = $_POST['pattern'];

$query = "SELECT * FROM illness WHERE title LIKE '%$pattern%';";

$results = $conn->query($query);

if ($results->num_rows > 0) {
    echo "<table style='width: 100%'>";
    echo "<tr>";
    echo "<th style='width: 10%'>code</th>";
    echo "<th style='width: 20%'>illness title</th>";
    echo "<th colspan='3' style='width: 70%'>illness description</th>";
    echo "</tr>";

    while ($row = $results->fetch_assoc()) {
        echo "<tr><td class='ill-code'>" . $row["ill_code"] . "</td><td class='ill-title'>" . $row["title"] . "</td><td class='ill-description'>" . $row["description"] . "</td><td width='5%'><button type='button' class='btn btn-info btn-edit' data-id='".$row['ill_code']."' style='margin: auto'>Edit</button></td><td width='5%'><button type='button' class='btn btn-danger btn-delete' data-id='".$row['ill_code']."' style='margin: auto'>Delete</button></td></tr>";
    }

    echo "</table>";
}
mysqli_close($conn);

?>