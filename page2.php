<!DOCTYPE html>
<html lang='en'>

<?php
include 'include';
include 'header.php';
?>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>Křenka Služby- Dev</title>

    <!-- Custom fonts for this template-->
    <link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'
        rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href='css/sb-admin-2.css' rel='stylesheet'>
    

</head>

<body>
    <!-- Page Wrapper -->

    <div id='wrapper'>



        <!-- Sidebar -->
        <div class="wrapper"></div>
        <ul class='navbar-nav bg-primary sidebar sidebar-dark accordion' id='accordionSidebar'>



            <!-- Sidebar - Brand -->

            <a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.php'>

                <div class=''>

                    <i class='fas fa-fw fa-wrench'></i>

                </div>

                <div class='sidebar-brand-text mx-3'>Křenka Služby</div>

            </a>



            <!-- Divider -->

            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Přehled -->
            <li class='nav-item active'>

                <a class='nav-link' href='index.php'>

                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PŘEHLED</span></a>

            </li>



            <!-- Divider -->

            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Projektory -->
            <li class='nav-item Show'>
                <a class='nav-link' href='projektory.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PROJEKTORY</span></a>

            </li>



            <!-- Divider -->

            <hr class='sidebar-divider my-1'>


            <!-- Verzování -->
            <li class='nav-item Show text-gray-400 text-center d-sm-inline-block'>
                
                    <small class="version">Verze aplikace: 1.1.1</small>

            </li>

            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class='text-center d-none d-md-inline'>
                <button class='rounded-circle border-0' id='sidebarToggle'></button>
            </div>







            



        </ul>



        <!-- Topbar -->

        <?php
            draw_topbar();
        ?>  


    </div>

    <!-- Bootstrap core JavaScript-->

    <script src='vendor/jquery/jquery.min.js'></script>

    <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>



    <!-- Core plugin JavaScript-->

    <script src='vendor/jquery-easing/jquery.easing.min.js'></script>



    <!-- Custom scripts for all pages-->

    <script src='js/sb-admin-2.min.js'></script>



    <!-- Page level plugins -->

    <script src='vendor/chart.js/Chart.min.js'></script>



    <!-- Page level custom scripts -->

    <script src='js/demo/chart-area-demo.js'></script>

    <script src='js/demo/chart-pie-demo.js'></script>

</body>
