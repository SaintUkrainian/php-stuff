<?php
session_start();

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

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$id = $_SESSION["clicked_id"];
$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;

$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE id='$id'";
$result = $conn->query($sql);
header("Location:/laba2/profile.php?id=$id");
