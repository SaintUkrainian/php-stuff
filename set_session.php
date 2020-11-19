<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
$_SESSION["auth"] = false;
echo "Session variables are set.";
?>
</body>
</html>
