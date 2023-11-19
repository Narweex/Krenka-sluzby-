<?php
include 'connection.php';
include 'config.php';
   
?>

<?php
 $nazev_zarizeni = $_REQUEST['nazev_zarizeni'];
$mistnost = $_REQUEST['mistnost'];
$bezdratovy = $_REQUEST['bezdratovy'];
$konektor = $_REQUEST['konektor'];

if ($bezdratovy == 'f'){
    $bezdratovy = "Ne";
}
else{
    $bezdratovy = "Ano";
}


$sql = "insert into projektory values ( 'NULL', '$nazev_zarizeni', '$mistnost', '$bezdratovy', '$konektor');";

    if(mysqli_query($conn, $sql)){
        
        if(DEBUG_MODE){
        echo "Error: " . mysqli_error($conn);
        }
    }

mysqli_close($conn);

?>

