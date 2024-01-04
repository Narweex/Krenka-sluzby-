<!DOCTYPE html>
<html lang="en">

<?php
include 'include.php';

if (!isset($_SESSION['user_token'])) {
    header("Location: login.php");

}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Křenka Služby- Přidat Zařízení</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php

        draw_sidebar();

        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 <!-- Topbar -->

                 <?php

                draw_topbar();

                ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Přidat Zařízení</h1>

                    <!-- Form Přidat Zařízení -->
                    <form class="card-body" action="pridat_zarizeni_do_databaze.php" method="post">

                        <!-- Input Message Název Zařízení -->
                        <label>Název Zařízení:</label>
                        <input class="form-control mb-5" type="text" name="nazev_zarizeni">

                        <!-- Input message Místnost -->
                        <label>Místnost:</label>
                        <input class="form-control mb-5" type="text" name="mistnost">

                        <!-- Dropdown Select Menu Bezdrátové -->
                        <div class="dropdown  mb-5">
                            <label for="" class="mb-1">Bezdrátové:</label>
                            <select class="custom-select" name="bezdratovy">
                                <option value="1">Ano</option>
                                <option value="2">Ne</option>   
                            </select>
                        </div>

                        <!-- Dropdown Select Menu Konektor -->
                       

                        <div class="dropdown  mb-5">
                            <label for="" class="mb-1">Konektor:</label>
                            <select class="custom-select" name="konektor">
                                <option value="1">HDMI </option>
                                <option value="2">VGA</option>
                                <option value="3">HDMI + VGA</option>    
                            </select>
                        </div>

                        <!-- Button Odeslat -->
                        <button type="submit" class="btn btn-primary">Odeslat</button>

                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php

                footer();

            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
        draw_modal();
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>