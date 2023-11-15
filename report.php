<!DOCTYPE html>

<html>

<?php
include 'connection.php';
include 'config.php';
?>


<head>
        <title>Hlášení</title>
    </head>


<body>
    <?php
include 'connection.php';
include 'config.php';


    $trida = $_REQUEST['trida'];
    $device = $_REQUEST['zarizeni'];
    $popis = $_REQUEST['popis'];
    $projector_id = 0;
	

 $sql1 = "SELECT id FROM projektory p WHERE p.trida='$trida';";

$conn1 = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn1, $sql1);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $projector_id = $row['id'];
    }
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn1);
}

mysqli_close($conn1);





    $sql = "INSERT INTO problemy (id, id_uzivatel, id_projektor, chyba, cas_opravy, status, popis_reseni, vytvoreno) VALUES (NULL, '1', '$projector_id', '$popis', '', 'f', '', current_timestamp());";

    $conn = mysqli_connect($servername, $username, $password, $dbName);

 if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $sql)) {
        echo "Stored";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
	
	sleep(5);

    ?>
</body>
</html>

