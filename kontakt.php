<!DOCTYPE html>

<html lang="en">

<?php
include 'include.php';
/*
if (!isset($_SESSION['user_token'])) {
    header("Location: login.php");
}*/

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
                    
                    <!-- Page Heading Kontakty -->
                    <h1 class='h3 text-gray-800 mb-4'>Kontakty</h1>

                    <!-- Subheading Správci -->
                    <h2 class='h4 text-gray-700 mb-3'>Správci:</h2>

                    <!-- Content Row-->
                    <div class='row justify-content-start mb-4'>

                        <?php
                                $sql = "SELECT * from kontakty";
                                $result = mysqli_query($conn, $sql);
                                $result_check = mysqli_num_rows($result);

                                if($result_check > 0){
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo" 
                                        <!-- Card Kontakt- Správce -->
                                        <div class='col-xl-4 col-md-6 mb-4 '>
                                        <div class='card border border-left-primary'>
                                            <div class='card-body bg-white'>
                                                <div class='row align-items-center'>
                                                    

                                                    <div class='col-auto'>
                                                        <h3 class='h5 text-gray-600 font-weight-bold'>
                                                        " . $row['jmeno'] . "&nbsp;" . $row['prijmeni'] . "</h3>
                                                        
                                                        
                                                        <p>
                                                            E-mail: <a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a><br>
                                                            Telefon: " . $row['tel_cislo'] .
                                                        "
                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>";
                                    };
                                };
                                ?>


                        
                        
                    </div>



                    <!-- Subheading Vývojáři -->
                    <h2 class='h4 text-gray-700 mb-3'>Vývojáři:</h2>

                    <!-- Content Row -->
                    <div class='row justify-content-start mb-4'>

                        <!-- Card Kontakt- Gruber -->
                        <div class="col-xl-4 col-md-6 mb-4 ">
                            <div class='card border border-left-primary'>
                                <div class='card-body bg-white'>
                                    <div class='row align-items-center'>
                                        <!--<div class='col-3 ml-1'>
                                            <img src='img/undraw_profile.svg' class='img-profile rounded-circle'>
                                        </div>-->

                                        <div class='col-auto'>
                                            <h3 class='h5 text-gray-700 font-weight-bold'>Tomáš Gruber</h3>
                                            <p>
                                                E-mail: <a href='mailto: gruber@web-lab.cz'>gruber@web-lab.cz</a><br>
                                                Telefon: 604 147 970
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>


                        <!-- Card Kontakt- Kříž -->
                        <div class="col-xl-4 col-md-6 mb-4 ">
                            <div class='card border border-left-primary'>
                                <div class='card-body bg-white'>
                                    <div class='row align-items-center'>
                                        <!--<div class='col-3 ml-1'>
                                            <img src='img/undraw_profile.svg' class='img-profile rounded-circle'>
                                        </div>-->

                                        <div class='col-auto'>
                                            <h3 class='h5 font-weight-bold text-gray-700'>Jakub Kříž</h3>
                                            <p>
                                                E-mail: <a href='mailto: krizj@web-lab.cz'>krizj@web-lab.cz</a><br>
                                                Telefon: 731 934 429
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>


                    </div>


                    

                </div>
                <!-- End of Container fluid -->

            </div>
            <!-- End of Content-->


            <!-- Footer -->
            <?php
                footer();
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->

    <a class="scroll-to-top rounded" href="#page-top">

        <i class="fas fa-angle-up"></i>

    </a>

    <!-- Logout modal -->
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



    <!-- Page level plugins -->

    <script src="vendor/chart.js/Chart.min.js"></script>



    <!-- Page level custom scripts -->

    <script src="js/demo/chart-area-demo.js"></script>

    <script src="js/demo/chart-pie-demo.js"></script>

</body>
