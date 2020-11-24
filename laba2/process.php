<?php

// Start the session
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

$login = $_POST['login'];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE login='$login' and password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $email = $row["email"];
    $_SESSION["user_name"] = $first_name ." ". $last_name;
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["email"] = $email;
    $_SESSION["id"] = $row["id"];
    $_SESSION["role"] = $row["role"];
    header("Location:/laba2/homepage.php");
} else {
    header("Location:/laba2/login.php");
}
