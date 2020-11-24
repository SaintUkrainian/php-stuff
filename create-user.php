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
$login = $_POST['login'];
$password = $_POST["password"];


$insert_query = "INSERT INTO users (first_name, last_name, login ,password, id_role) 
            VALUES ('$first_name', '$last_name','$login', '$password', 1);";
$result = $conn->query($insert_query);
$_SESSION["name"] = $first_name;
header("Location:/welcome.php");