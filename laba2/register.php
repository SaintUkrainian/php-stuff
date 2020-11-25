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
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$role = $_POST["role"];
$email = $_POST["email"];
$login = $_POST['login'];
$password = $_POST["password"];


$insert_query = "INSERT INTO users (first_name, last_name, login ,password, role, email) 
            VALUES ('$first_name', '$last_name','$login', '$password', '$role', '$email');";
$result = $conn->query($insert_query);
$get_user_id = "SELECT id FROM users WHERE login='$login' and role='$role'";
$result = $conn->query($get_user_id);

$row = $result->fetch_assoc();

$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;
$_SESSION["role"] = $role;
$_SESSION["id"] = $row["id"];
$_SESSION["user_name"] = $first_name . " " . $last_name;

header("Location:/laba2/homepage.php");