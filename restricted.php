<?php
// Start the session
session_start();

if($_SESSION["auth"]) {
    echo "<h1>You are authorized</h1>";
} else {
    echo "<a href='login.php'>Login first!</a>";
}
