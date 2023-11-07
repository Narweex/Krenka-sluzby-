<!DOCTYPE html>
<html>
<body>

<h1>
<?php
echo "My first PHP script!";
?>
</h1>

<?php
$servername = "localhost";
$username = "c0dev";
$password = "bobrjenejlepsi";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";




?>

</body>
</html>