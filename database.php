<!DOCTYPE html>
<html>
<body>

<h1>
<?php
echo "My first PHP script!";
?>
</h1>


<div>
<?php
$servername = "";
$username = "";
$password = "";
$dbName = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" ."<br>";



$sql = "SELECT * FROM projektory;";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$result_check = mysqli_num_rows($result);

if ($result_check > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['nazev'] . "<br>";
           }
}




?>
</div>

</body>
</html>
