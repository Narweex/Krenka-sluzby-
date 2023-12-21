<!DOCTYPE html>

<html>

<?php
include 'connection.php';
include 'config.php';

if(!isset($_SESSION['user_token'])){
    header("Location: login.php");
}


?>


<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />

    <meta name="author" content="" />



    <title>Křenka Služby- Problém nahlášen</title>



    <!-- Custom fonts for this template-->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />



    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

</head>


<body>
    <?php

    session_start();


    $trida = $_REQUEST['trida'];
    $device = $_REQUEST['zarizeni'];
    $popis = $_REQUEST['popis'];
    $uzivatel = $_SESSION['user_id'];
    $projector_id = 0;
    echo $uzivatel;

    $sql = "SELECT id FROM projektory p WHERE p.trida='$trida';";



    if (!$conn && DEBUG_MODE) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $projector_id = $row['id'];
        }
    } else if (DEBUG_MODE) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }






    $sql = "INSERT INTO problemy (id_uzivatel, id_projektor, chyba, cas_opravy, status, popis_reseni, vytvoreno)
              VALUES ('$uzivatel', '$projector_id', '$popis', '', 'f', '', current_timestamp());";



    if (!$conn && DEBUG_MODE) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $sql)) {
        if (DEBUG_MODE) {
            echo "Stored";
        }
    } else if (DEBUG_MODE) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    ?>

    <!-- Page Wrapper-->
    <div id="wrapper">

        <!-- Content Wrapper-->
        <div id="content-wrapper">

            <div class="mt-4">

                <!-- Page Heading-->
                <h1 class="h3 mb-0 text-gray-800 text-center"> Děkujeme za nahlášení problému</h1>
            </div>

            <div class="my-4 text-center">

                <!-- Button Zpět na hlavní stránku-->
                <a href="index.php" class="btn btn-primary mx-auto">
                    <span class="text">Zpět na hlavní stránku</span>
                </a>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">

                <div class="container my-auto">

                    <div class="copyright text-center my-auto">

                        <span>Copyright &copy; <a href="https://web-lab.cz/">Web-Lab.cz</a> & Seminář IVT 2023/24 </span>
                        

                    </div>

                </div>

            </footer>

            <!-- End of Footer -->

        </div>
    </div>


</body>
</html>
