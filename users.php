<?php


$servername = "localhost";
$username = "root";
$password = "00zomifi";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<table border='2px'>";
if ($result->num_rows > 0) {
    // output data of each row
    echo "<tbody>";
    echo "<thead>";
    echo "<th>Id</th>";
    echo "<th>Name</th>";
    echo "<th>Image</th>";
    while ($row = $result->fetch_assoc()) {
        $img = $row['img'];
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>." ."<td>" . $row["first_name"]. " ".$row["last_name"]. "</td>". "<td>". "<img src='$img' width='200px' height='200px'>". "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
} else {
    echo "nothing found";
}

echo "</table>";