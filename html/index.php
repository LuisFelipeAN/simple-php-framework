<html>
<?php

echo 'Versão Atual do PHP: ' . phpversion();

$servername = "mysql";
$username = "admin";
$password =  "admin";

// Create connection
$conn = new  mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<br /> Connected successfully";
?>

</html>