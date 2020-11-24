<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Users</title>
</head>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <h1 class="text-light">Users' page</h1>
        <div>

            <?php

            if(($_SESSION["id"] == null) && ($_SESSION["role"] == null)) {
                echo "<a class='btn btn-info' href='login.php'>Login</a> ";
                echo "<a class='btn btn-success' href='signup.php'>Sign up</a>";
            } else {
                $id = $_SESSION["id"];
                echo "<a class='btn btn-primary' href='profile.php?id=$id'>My Profile</a> ";
                echo "<a class='btn btn-danger' href='logout.php'>Logout</a>";
            }

            ?>
        </div>
    </nav>
</header>
<body>
 <div class="container">
     <table class="table table-dark table-hover">
         <thead class="thead-dark">
             <th scope="col">
                 Id
             </th>
             <th scope="col">
                 Name
             </th>
             <th scope="col">
                 Email
             </th>
             <th scope="col">
                 Role
             </th>
         </thead>
         <tbody>
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

         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $img = $row['img'];
                 $id = $row["id"];
                 echo "<tr ". "onclick="."checkItem("."$id".".)>";
                 echo "<td>" . $row["id"] . "</td>." ."<td>" . $row["first_name"]. " ".$row["last_name"]. "</td>". "<td>".$row["email"]."</td>" ."<td>". $row["role"]."</td>";
                 echo "</tr>";
             }
         } else {
             echo "<tr><tr>empty</tr><tr>empty</tr><tr>empty</tr><tr>empty</tr></tr>";
         }
         ?>
         </tbody>
     </table>
 </div>
</body>
<script>
    function checkItem(param) {
        location.replace("/laba2/profile.php?id=" + param);
    }
</script>
</html>
