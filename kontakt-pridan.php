<!DOCTYPE html>

<html>
<?php
include 'include.php';

if(!isset($_SESSION['user_token']) && $_SESSION['user_group'] == 1|| $_SESSION['user_group'] == 2){

    header("Location: index.php");
}
?>

<head>



    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />

    <meta name="author" content="" />



    <title>Křenka Služby- Kontakty</title>



    <!-- Custom fonts for this template-->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />



    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.css" rel="stylesheet" />



</head>

<?php

    $jmeno = $_POST['jmeno'];
    $prijmeni = $_POST['prijmeni'];
    $email = $_POST['email'];
    $tel_cislo = $_POST['tel_cislo'];

    if (strlen($tel_cislo) === 9){
        $tel_cislo_format = substr($tel_cislo,0,3) . ' '. substr($tel_cislo,3,3) . ' ' . substr($tel_cislo,6);
    }
    else{
        $tel_cislo_format = $tel_cislo;
    }

    $sql = "INSERT into kontakty
            VALUES ('NULL','$jmeno','$prijmeni','$email','$tel_cislo_format')";

    if(mysqli_query($conn, $sql)){

        if(DEBUG_MODE){
        echo "Error: " . mysqli_error($conn);
        }
    }


?>

<body>

    <!-- Page Wrapper -->
    <div id='page-wrapper'>

        <!-- Content Wrapper -->    
        <div id='content-wrapper'>

            <div class='mt-4'>
                <!-- Page Heading -->
                <h1 class='h3 text-gray-800 text-center'>Kontaktní údaje byly přidány</h1>
            </div>

            <div class='my-4 text-center'>
                <!-- Button Zpět na hlavní stránku -->
                <a href='index.php' class='btn btn-primary'>
                    <span>Zpět na hlavní stránku</span>
                </a>

                <!-- Button Přidat další -->
                <a href='pridat-kontakt.php' class='btn btn-primary'>
                    <span>Přidat další kontakt</span>
                </a>

            </div>

            <!-- Footer -->
            <?php
                footer();
            ?>

        </div>


    </div>



</body>
</html>