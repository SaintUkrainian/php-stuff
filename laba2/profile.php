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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>

<div class="container-sm p-10">
    <h1>Your profile</h1>
    <?php
    if($_SESSION["id"] == null) {
        header("Location:/laba2/login.php");
    }
    $array = array();
    parse_str($_SERVER['QUERY_STRING'], $array);
    $id = $array["id"];

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

    $query = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $_SESSION["first_name"] = $row["first_name"];
    $_SESSION["last_name"] = $row["last_name"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["clicked_role"] = $row["role"];
    $_SESSION["clicked_id"] = $id;

    ?>
    <form action="update.php" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">First Name</label>
            <input type="text" name="first_name" <?php if($_SESSION["id"] != $_SESSION["clicked_id"] && $_SESSION["role"] != "admin") echo "readonly"?> class="form-control" id="formGroupExampleInput" placeholder="First Name" value="<?php echo $_SESSION["first_name"]?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Last name</label>
            <input type="text" name="last_name" <?php if($_SESSION["id"] != $_SESSION["clicked_id"] && $_SESSION["role"] != "admin") echo "readonly"?> class="form-control" id="formGroupExampleInput2" placeholder="Last Name" value="<?php echo $_SESSION["last_name"]?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="text" name="email" <?php if($_SESSION["id"] != $_SESSION["clicked_id"] && $_SESSION["role"] != "admin") echo "readonly"?> class="form-control" id="formGroupExampleInput2" placeholder="Email" value="<?php echo $_SESSION["email"]?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Role</label>
            <input type="text" readonly <?php if($_SESSION["id"] != $_SESSION["clicked_id"] && $_SESSION["role"] != "admin") echo "readonly"?> class="form-control" id="formGroupExampleInput2" value="<?php echo $_SESSION["clicked_role"]?>">
        </div>
        <div class="form-group">
            <button type="submit" <?php if($_SESSION["id"] != $_SESSION["clicked_id"] && $_SESSION["role"] != "admin") echo "disabled"?> class="btn btn-primary">Update</button>
        </div>
    </form>
    <a href="homepage.php" class="primary">go home</a>
</div>





</body>
</html>
