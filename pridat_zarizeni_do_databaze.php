<?php
include 'connection.php';
include 'config.php';
   
?>

<?php
 $nazev_zarizeni = $_REQUEST['nazev_zarizeni'];
$mistnost = $_REQUEST['mistnost'];
$bezdratovy = $_REQUEST['bezdratovy'];

$konektor = $_REQUEST['konektor'];

//if ($konektor == '1'){
//    $konektor = "1";
//}
//else if ($konektor == '2'){
//    $konektor = "2";
//}
//else if ($konektor == '3'){
//    $konektor = "3";
//}
if(DEBUG_MODE){
    echo $konektor . "<br>";
}


if ($bezdratovy == 'Ne'){
    $bezdratovy = "f";
}
else{
    $bezdratovy = "t";
}


$sql = "insert into projektory values ( 'NULL', '$nazev_zarizeni', '$mistnost', '$bezdratovy', '$konektor');";

    if(mysqli_query($conn, $sql)){

        if(DEBUG_MODE){
        echo "Error: " . mysqli_error($conn);
        }
    }

mysqli_close($conn);

?>

