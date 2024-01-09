<!DOCTYPE html>

<html>

<?php
include 'include.php';

if(!isset($_SESSION['user_token']) && $_SESSION['user_group'] == 1|| $_SESSION['user_group'] == 2){

    header("Location: index.php");
}
?>

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Křenka Služby- Problém nahlášen</title>



    <!-- Custom fonts for this template-->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

        rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body>

<?php
 $nazev_zarizeni = $_REQUEST['nazev_zarizeni'];
$mistnost = $_REQUEST['mistnost'];
$cislo_mistnosti = $_REQUEST['cislo_mistnosti'];
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


$sql = "INSERT into projektory values ( 'NULL', '$nazev_zarizeni', '$mistnost', '$cislo_mistnosti', '$bezdratovy', '$konektor');";

    if(mysqli_query($conn, $sql)){

        if(DEBUG_MODE){
        echo "Error: " . mysqli_error($conn);
        }
    }

mysqli_close($conn);

?>

        <!-- Page Wrapper-->
        <div id="wrapper">

            <!-- Content Wrapper-->
            <div id="content-wrapper">


                <div class="mt-4">
                
                    <!-- Page Heading-->
                    <h1 class="h3 mb-0 text-gray-800 text-center"> Zařízení bylo přidáno do databáze</h1>  
                </div>
                
                <div class="my-4 text-center">
                
                    <!-- Button Zpět na hlavní stránku-->
                    <a href="index.php" class="btn btn-primary mx-auto mt-3">
                        <span class="text">Zpět na hlavní stránku</span>
                        </a>
                    
                    <!-- Button Přidat další zařízení -->
                    <a href="pridat-zarizeni.php" class="btn btn-primary mx-auto mt-3">
                        <span class="text">Přidat další zařízení</span>
                        </a>
                </div>
                <!-- Footer -->
                <?php

                    footer();

                ?>
    
                <!-- End of Footer -->

            </div>

        </div>




</body>
</html>

