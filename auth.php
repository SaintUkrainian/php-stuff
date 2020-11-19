<?php

// Start the session
session_start();

$login = "admin";
$password = "1111";


$equal = "Not Equal";

if($_POST["login"] == $login && $_POST["password"] == $password) {
    $equal = "Equal";
    $_SESSION["auth"] = true;
    header("Location:/restricted.php");
}

echo "$equal";