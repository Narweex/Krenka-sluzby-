<!DOCTYPE html>

<html lang="en">

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

<body id='page-top'>

    <!-- Page Wrapper-->
    <div id='wrapper'>

        <!-- Sidebar -->
        <?php
            draw_sidebar();
        ?>

        <!-- Content Wrapper -->
        <div class='d-flex flex-column' id='content-wrapper'>

            <!-- Content -->
            <div id='content'>

                <!-- Topbar -->
                <?php
                    draw_topbar();
                ?>
                <!-- End of Topbar-->


                <!-- Begin Page Content -->
                <div class='container-fluid'>
                    <!-- Heading Přidání pole -->
                    <h1 class='h3 text-gray-800'>Přidání banneru s kontaktními informacemi</h1>
                    <p>Vyplněním následujícího formuláře přidáte banner s kontaktními informacemi do sekce Správci na stránce Kontakt</p>

                    <!-- Form přidat kontaktní banner-->
                    <form method="post" action='kontakt-pridan.php'>
                        
                        <!-- Input Msg Jméno -->
                        <label>Jméno</label>
                        <input type='text' name='jmeno' class='form-control mb-4'>

                        <!-- Input Msg Příjmení -->
                        <label>Příjmení</label>
                        <input type='text' name='prijmeni' class='form-control mb-4'>

                        <!-- Input Msg Email -->
                        <label>E-mail</label>
                        <input type='email' name='email' class='form-control mb-4'>

                        <!-- Input Msg Tel. cislo -->
                        <label>Telefonní číslo</label>
                        <input type='text' name='tel_cislo' class='form-control mb-3' placeholder="123 456 789">

                        <!-- Submit Button Odeslat -->
                        <button class='btn btn-primary mb-4' type='submit'>Odeslat</button>
                    </form>
                </div>
                <!-- End Page Content(container-fluid) -->

            </div>
            <!-- End of Main Content-->

            <!-- Footer -->
            <?php

                footer();

            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper-->

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