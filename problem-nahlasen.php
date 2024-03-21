<!DOCTYPE html>

<html>

<?php
include 'include.php';

if (!isset($_SESSION['user_token'])) {
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


    /*
     *
     *
     * Přidání do tabulky problemy
     *
     *
     */

    //ziskani informaci z formuláře
    $trida = $_REQUEST['trida'];
    $device = $_REQUEST['zarizeni'];
    $popis = $_REQUEST['popis'];
    $uzivatel = $_SESSION['user_id'];
    $projector_id = 0;



    //SQL string bude potřeba zabazpečit
    $sql = "SELECT id FROM projektory p WHERE p.trida='$trida';";


    //Vyhodí chybu když je debug mode
    if (!$conn && DEBUG_MODE) {
        die("Connection failed: " . mysqli_connect_error());
    }


    //odpověď z databáze
    $result = mysqli_query($conn, $sql);


    //pokud je odpověď nulová vyhodí chybu
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $projector_id = $row['id'];
        }
    } else if (DEBUG_MODE) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }






    $sql = "INSERT INTO problemy (id_problemu, id_uzivatel, id_projektor, chyba, cas_opravy, status, popis_reseni, vytvoreno, zobrazen_na_discordu)
              VALUES ('', '$uzivatel', '$projector_id', '$popis', '', 'f', '', current_timestamp(), '');";



    if (!$conn && DEBUG_MODE) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $sql)) {
        if (DEBUG_MODE) {
            echo "User " . $uzivatel . " reported " . $device . " Succesfully";
        }
    } else if (DEBUG_MODE) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    ////////////////////////////////////////////////////////////////////////////////////
    /*
     *
     *
     * Přidání do tabulky oznameni
     *
     *
     */
    $sql = "select * from problemy p where p.id_projektor='$projector_id' AND p.status='f' order by p.id_problemu DESC limit 1;";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result))

            $id_problemu = $row['id_problemu'];


    }




    $sql = "INSERT INTO `oznameni` (`id`, `id_problemu`, `typ`, `zmena`, `cas`) VALUES ('', '$id_problemu', 'projektor', 'f', current_timestamp());";

    $result = mysqli_query($conn, $sql);

    /*if(!DEBUG_MODE){
       sleep(5);
    header("Location: index.php");
    }*/



    ?>

    <!-- Page Wrapper-->
    <div id="wrapper">

        <!-- Content Wrapper-->
        <div id="content-wrapper">

            <div class="mt-4">

                <!-- Page Heading-->
                <h1 class="h3 mb-0 text-gray-800 text-center"> Děkujeme za nahlášení problému</h1>
            </div>

            <?php
            if (DEBUG_MODE) {

                echo $trida;
                echo $device;
                echo $popis;
                echo $uzivatel;
            }

            ?>

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


    <script>
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function demo() {
            for (let i = 0; i < 3; i++) {
                console.log(`Waiting ${i} seconds...`);
                await sleep(i * 1000);
            }
            console.log('Done');

            //redirect to index
            window.location.replace("index.php");
        }

        demo();
    </script>


</body>
</html>
