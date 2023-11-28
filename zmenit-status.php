<!DOCTYPE html>

<html>

<?php
include 'include.php';
?>


<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />

    <meta name="author" content="" />



    <title>Křenka služby - editace</title>



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





    $problem_id = $_REQUEST['cislo_problemu'];

    $status = $_REQUEST['set_status'];

    $popis_reseni = $_REQUEST['popis_reseni'];




    echo "ID problemu " . $problem_id. "<br>";

    echo "Status " . $status. "<br>";

    echo "Popis:  " . $popis_reseni. "<br>";





    if($status == '1'){

        $status = "t";

    }

    else if($status == '2'){

        $status = "f";

    }

    else if($status == '3'){

        $status = "z";

    }

    echo "Status " . $status . "<br>";



    $sql = "update problemy set status='$status', popis_reseni='$popis_reseni' where id_problemu='$problem_id';";





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
                <h1 class="h3 mb-0 text-gray-800 text-center"> Status zařízení v databázi byl změněn</h1>
            </div>

            <div class="my-4 text-center">

                <!-- Button Zpět na hlavní stránku-->
                <a href="index.php" class="btn btn-primary mx-auto">
                    <span class="text">Zpět na hlavní stránku</span>
                </a>

                <!-- Button Pokračovat v úpravách -->
                <a href="panel.php" class="btn btn-primary mx-auto">
                    <span class="text">Pokračovat v úpravách</span>
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
