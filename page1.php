<!DOCTYPE html>

<html lang="en">

<?php
include 'include.php';
?>


<head>



    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />

    <meta name="author" content="" />



    <title>Křenka Služby</title>



    <!-- Custom fonts for this template-->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />



    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.css" rel="stylesheet" />



</head>



<body id="page-top">



    <!-- Page Wrapper -->

    <div id="wrapper">



        <!-- Sidebar -->

        <?php

        draw_sidebar();

        ?>

        <!-- End of Sidebar-->



        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->

            <div id="content">



                <!-- Topbar -->

                 <!-- Topbar -->

                 <nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>



                        <!-- Sidebar Toggle (Topbar) -->

                        <button id='sidebarToggleTop' class='btn btn-link d-md-none rounded-circle mr-3'>

                            <i class='fa fa-bars'></i>

                        </button>

                            <!-- Button Nahlásit Problém -->
                            <a href='nahlasit-problem.php' class='btn btn-secondary'>
                                <span class='icon text-white-50'>

                                </span>
                                <span class='text'>Nahlásit problém</span>
                            </a>



                        <!-- Topbar Navbar -->
                        <ul class='navbar-nav ml-auto'>
                            
                            
                            <!-- Link Potřebujete poradit? -->
                            <div class='d-none d-sm-inline-block nav-item dropdown no-arrow'>

                                <a class='text-gray-600 nav-link dropdown-toggle' href='dokumentace.php'>
                                    <i class='fa fa-lightbulb'></i>
                                    &nbsp; Potřebujete poradit?
                                </a>


                            </div>

                            <!-- Icon Potřebujete poradit? (visible only XS)-->
                            <div class='d-block d-sm-none nav-item'>
                                <a href='dokumentace.php' class='nav-link text-gray-600'>
                                    <i class='fa fa-lightbulb'></i>
                                </a>
                            </div>


                            <!-- Nav Item - Upozornění -->

                            <li class='nav-item dropdown no-arrow mx-1'>


                                <a class='nav-link dropdown-toggle' href='#' id='alertsDropdown' role='button'
                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>

                                    <i class='fas fa-bell fa-fw'></i>

                                    <!-- Counter - Upozornění-->

                                    <span class='badge badge-danger badge-counter'>2</span>

                                </a>

                                <!-- Dropdown - Upozornění -->

                                <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='alertsDropdown'>


                                    <h6 class='dropdown-header'>
                                        Oznámení
                                    </h6>

                                    <a class='dropdown-item d-flex align-items-center' href='#'>

                                        <div>

                                            <div class='d-flex w-100 justify-content-between'>
                                                <small class='text-muted'>10.11. 2023</small>
                                            </div>
                                            <p class='mb-1'>Zařízení <u>Projektor</u> v&#160místnosti <u>1.A</u> bylo označeno jako <b style='color:#1cc88a;'>funkční</b></p>

                                        </div>

                                    </a>

                                    <a class='dropdown-item d-flex align-items-center' href='#'>


                                        <div>

                                            <div class='d-flex w-100 justify-content-between'>
                                                <small class='text-muted'>11.11. 2023</small>
                                            </div>
                                            <p class='mb-1'>Zařízení <u>Tiskárna</u> v&#160místnosti <u>Kabinet AJ</u> bylo označeno jako <b style='color: #e74a3b;'>nefunkční</b> </p>

                                        </div>

                                    </a>
                                    <a class='dropdown-item text-center small text-gray-500' href='oznameni.php'>Všechna oznámení</a>
                                </div>

                            </li>

                            <!-- Nav Item - Informace o uživateli -->
                            <li class='nav-item dropdown no-arrow'>

                                <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button'
                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <span class='mr-2 d-none d-lg-inline text-gray-600 small'>Uživatel</span>
                                    <img class='img-profile rounded-circle'
                                        src=''>

                                </a>

                                <!-- Dropdown - Informace o uživateli -->

                                <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
                                    aria-labelledby='userDropdown'>


                                    <a class='dropdown-item' href='#' data-toggle='modal' data-target='#logoutModal'>

                                        <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                                        Odhlásit se
                                    </a>

                                </div>

                            </li>



                        </ul>



                </nav>

                <!-- End of Topbar -->



                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!--Heading-Projektory -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800"> Projektory </h1>

                        <?php

                        $conn = mysqli_connect($servername, $username, $password, $dbName);




                        if (!$conn) {
                            if (DEBUG_MODE) {
                                die("Spojení selhalo: " . mysqli_connect_error());
                            }
                            die();
                        }

                        if (DEBUG_MODE) {
                            echo "Připojeno k databázi <br>";
                        }


                        $today = date("d.m.Y");

                        echo "Dnes je $today";





                        ?>
                        <!--</div>-->





                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                            class="fas fa-envelope fa-sm text-white-50"></i> Nahlásit problém</a>-->



                    </div>



                    <!--Button-Nahlásit Problém

                    <div>

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-success shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">

                                                nahlásit problém </div>

                                            

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-check fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>-->



                    <!-- Content Row -->

                    <div class="row">



                        <!--Card Example-Funkční Projektory-->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-success shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Funkční</div>
                                                </a>
                                                <small class="text-gray-600">Projektory, u kterých nejsou nahlášeny závady</small>
                                                <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in scrollable-menu" aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">V místnostech:</div>

                                                    <?php

                                                    $sql = "SELECT p.*, r.* FROM projektory p LEFT JOIN problemy r ON r.id_projektor = p.id WHERE r.status IS NULL OR (r.id_projektor, r.vytvoreno) IN (SELECT id_projektor, MAX(vytvoreno) AS max_created_at FROM problemy WHERE status = 't' GROUP BY id_projektor);";

                                                    $result = mysqli_query($conn, $sql);

                                                    if (!$result) {
                                                        if (DEBUG_MODE) {
                                                            die("Query failed: " . mysqli_error($conn));
                                                        }
                                                    }

                                                    $result_check = mysqli_num_rows($result);

                                                    if ($result_check > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                            echo "<a class='dropdown-item' href='#'>" . $row['trida'] . "</a>";

                                                        }
                                                    }
                                                    ?>
                                                </div>




                                            </div>


                                            <div class="h5 mb-0 mt-2 font-weight-bold text-success">
                                                <?php

                                                $conn = mysqli_connect($servername, $username, $password, $dbName);


                                                $sql3 = "SELECT * FROM projektory p LEFT JOIN problemy r ON r.id_projektor = p.id WHERE r.status IS NULL OR (r.id_projektor,r.vytvoreno) IN (SELECT id_projektor, MAX(vytvoreno) AS max_created_at FROM problemy GROUP BY id_projektor) AND r.status = 't';";

                                                if ($result3 = mysqli_query($conn, $sql3)) {

                                                    $num = mysqli_num_rows($result3);

                                                    echo $num;

                                                } else {
                                                    echo "Chyba";
                                                }

                                                ?>



                                            </div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-check fa-2x text-gray-300"></i>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!--Card Example-Nefunkční Projektory-->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-danger shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Se závadou</div>
                                                </a>
                                                <small class="text-gray-600">Projektory, u kterých byla nahlášena závada</small>
                                                <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in scrollable-menu" aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">V místnostech:</div>
                                                    <?php

                                                    $sql = "SELECT p.id, p.nazev, p.trida, r.status, r.vytvoreno FROM projektory p LEFT JOIN problemy r ON r.id_projektor = p.id WHERE (r.status IS NOT NULL AND r.status = 'f' AND (r.id_projektor, r.vytvoreno) IN ( SELECT id_projektor, MAX(vytvoreno) AS max_created_at FROM problemy WHERE status = 'f' GROUP BY id_projektor )) ORDER BY p.id, r.vytvoreno DESC;";

                                                    $result = mysqli_query($conn, $sql);

                                                    if (!$result) {
                                                        if (DEBUG_MODE) {
                                                            die("Query failed: " . mysqli_error($conn));
                                                        }
                                                    }

                                                    $result_check = mysqli_num_rows($result);

                                                    if ($result_check > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                            echo "<a class='dropdown-item' href='#'>" . $row['trida'] . "</a>";

                                                        }
                                                    }
                                                    ?>
                                                </div>




                                            </div>
                                            <div class="h5 mb-0 mt-2 font-weight-bold text-danger">
                                                <?php
                                                $conn = mysqli_connect($servername, $username, $password, $dbName);


                                                $sql3 = "SELECT * FROM projektory p LEFT JOIN problemy r ON r.id_projektor = p.id where r.status = 'f' group by p.id;";
                                                if ($result3 = mysqli_query($conn, $sql3)) {

                                                    $num = mysqli_num_rows($result3);

                                                    echo $num;

                                                } else {
                                                    echo "Vše funguje";
                                                }

                                                ?>




                                            </div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>





                        <!--Card Example-Probíhá oprava Projektory-->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-warning shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Probíhá oprava</div>
                                                </a>
                                                <small class="text-gray-600">Projektory, jejichž závada je právě řešena</small>
                                                <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in scrollable-menu" aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">V místnostech:</div>
                                                    <?php

                                                    $sql = "SELECT * FROM projektory p LEFT JOIN problemy r ON r.id_projektor = p.id where r.status = 'z' group by p.id;";

                                                    $result = mysqli_query($conn, $sql);

                                                    if (!$result) {
                                                        if (DEBUG_MODE) {
                                                            die("Query failed: " . mysqli_error($conn));
                                                        }
                                                    }

                                                    $result_check = mysqli_num_rows($result);

                                                    if ($result_check > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                            echo "<a class='dropdown-item' href='#'>" . $row['trida'] . "</a>";

                                                        }
                                                    }
                                                    ?>
                                                </div>




                                            </div>

                                            <div class="h5 mb-0 mt-2 font-weight-bold text-warning">
                                                <?php
                                                $conn = mysqli_connect($servername, $username, $password, $dbName);


                                                $sql3 = "SELECT * FROM projektory p left join problemy r on r.id_projektor=p.id where r.status='z' group by p.id;";
                                                if ($result3 = mysqli_query($conn, $sql3)) {

                                                    $num = mysqli_num_rows($result3);

                                                    echo $num;

                                                } else {
                                                    echo "Chyba";
                                                }

                                                ?>

                                            </div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-tools fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                    </div>

                    <!--Heading-Tiskárny 

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800"> Tiskárny </h1>
<!--    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
            class="fas fa-envelope fa-sm text-white-50"></i> Nahlásit problém</a>-->
                </div>



                <!-- Content Row

<div class="row"> 



    <!--Card Example-Funkční Tiskárny 

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-success shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">

                            Funkční</div>

                        <div class="h5 mb-0 font-weight-bold text-success">42</div>

                    </div>

                    <div class="col-auto dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-2x text-gray-300 fas fa-check"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                        

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!--Card Example-Nefunkční Tiskárny 

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-danger shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">

                            Nefunkční</div>

                        <div class="h5 mb-0 font-weight-bold text-danger">5</div>

                    </div>

                    <div class="col-auto dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-2x text-gray-300 fas fa-exclamation-triangle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                        

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!--Card Example-Se závadou Tiskárny 

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-warning shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">

                            Se závadou</div>

                        <div class="h5 mb-0 font-weight-bold text-warning">3</div>

                    </div>

                    <div class="col-auto dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-2x text-gray-300 fas fa-exclamation-triangle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>

                    </div>

                </div>

            </div>

        </div>

    </div>



    </div>

                        <!-- Pending Requests Card Example 

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-warning shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                                                Pending Requests</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-comments fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div> -->



                <!-- Content Row 



                    <div class="row"> -->



                <!-- Area Chart 

                        <div class="col-xl-8 col-lg-7">

                            <div class="card shadow mb-4">

                                 Card Header - Dropdown 

                                <div

                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>

                                    <div class="dropdown no-arrow">

                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"

                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"

                                            aria-labelledby="dropdownMenuLink">

                                            <div class="dropdown-header">Dropdown Header:</div>

                                            <a class="dropdown-item" href="#">Action</a>

                                            <a class="dropdown-item" href="#">Another action</a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="#">Something else here</a>

                                        </div>

                                    </div>

                                </div>

                                 Card Body 

                                <div class="card-body">

                                    <div class="chart-area">

                                        <canvas id="myAreaChart"></canvas>

                                    </div>

                                </div>

                            </div>

                        </div>



                         Pie Chart 

                        <div class="col-xl-4 col-lg-5">

                            <div class="card shadow mb-4">

                                Card Header - Dropdown 

                                <div

                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>

                                    <div class="dropdown no-arrow">

                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"

                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"

                                            aria-labelledby="dropdownMenuLink">

                                            <div class="dropdown-header">Dropdown Header:</div>

                                            <a class="dropdown-item" href="#">Action</a>

                                            <a class="dropdown-item" href="#">Another action</a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="#">Something else here</a>

                                        </div>

                                    </div>

                                </div>

                                 Card Body 

                                <div class="card-body">

                                    <div class="chart-pie pt-4 pb-2">

                                        <canvas id="myPieChart"></canvas>

                                    </div>

                                    <div class="mt-4 text-center small">

                                        <span class="mr-2">

                                            <i class="fas fa-circle text-primary"></i> Direct

                                        </span>

                                        <span class="mr-2">

                                            <i class="fas fa-circle text-success"></i> Social

                                        </span>

                                        <span class="mr-2">

                                            <i class="fas fa-circle text-info"></i> Referral

                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                     Content Row 

                    <div class="row"> -->



                <!-- Content Column 

                        <div class="col-lg-6 mb-4"> 



                             Project Card Example 

                            <div class="card shadow mb-4">

                                <div class="card-header py-3">

                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>

                                </div>

                                <div class="card-body">

                                    <h4 class="small font-weight-bold">Server Migration <span

                                            class="float-right">20%</span></h4>

                                    <div class="progress mb-4">

                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"

                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                                    </div>

                                    <h4 class="small font-weight-bold">Sales Tracking <span

                                            class="float-right">40%</span></h4>

                                    <div class="progress mb-4">

                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"

                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>

                                    </div>

                                    <h4 class="small font-weight-bold">Customer Database <span

                                            class="float-right">60%</span></h4>

                                    <div class="progress mb-4">

                                        <div class="progress-bar" role="progressbar" style="width: 60%"

                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>

                                    </div>

                                    <h4 class="small font-weight-bold">Payout Details <span

                                            class="float-right">80%</span></h4>

                                    <div class="progress mb-4">

                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"

                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>

                                    </div>

                                    <h4 class="small font-weight-bold">Account Setup <span

                                            class="float-right">Complete!</span></h4>

                                    <div class="progress">

                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"

                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>

                                    </div>

                                </div>

                            </div>



                             Color System 

                            <div class="row">

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-primary text-white shadow">

                                        <div class="card-body">

                                            Primary

                                            <div class="text-white-50 small">#4e73df</div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-success text-white shadow">

                                        <div class="card-body">

                                            Success

                                            <div class="text-white-50 small">#1cc88a</div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-info text-white shadow">

                                        <div class="card-body">

                                            Info

                                            <div class="text-white-50 small">#36b9cc</div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-warning text-white shadow">

                                        <div class="card-body">

                                            Warning

                                            <div class="text-white-50 small">#f6c23e</div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-danger text-white shadow">

                                        <div class="card-body">

                                            Danger

                                            <div class="text-white-50 small">#e74a3b</div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-secondary text-white shadow">

                                        <div class="card-body">

                                            Secondary

                                            <div class="text-white-50 small">#858796</div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-light text-black shadow">

                                        <div class="card-body">

                                            Light

                                            <div class="text-black-50 small">#f8f9fc</div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <div class="card bg-dark text-white shadow">

                                        <div class="card-body">

                                            Dark

                                            <div class="text-white-50 small">#5a5c69</div>

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div>



                        <div class="col-lg-6 mb-4">



                             Illustrations 

                            <div class="card shadow mb-4">

                                <div class="card-header py-3">

                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>

                                </div>

                                <div class="card-body">

                                    <div class="text-center">

                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"

                                            src="img/undraw_posting_photo.svg" alt="...">

                                    </div>

                                    <p>Add some quality, svg illustrations to your project courtesy of <a

                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a

                                        constantly updated collection of beautiful svg images that you can use

                                        completely free and without attribution!</p>

                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on

                                        unDraw &rarr;</a>

                                </div>
                            </div>



                             Approach 

                            <div class="card shadow mb-4">

                                <div class="card-header py-3">

                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>

                                </div>

                                <div class="card-body">

                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce

                                        CSS bloat and poor page performance. Custom CSS classes are used to create

                                        custom components and custom utility classes.</p>

                                    <p class="mb-0">Before working with this theme, you should become familiar with the

                                        Bootstrap framework, especially the utility classes.</p>

                                </div>

                            </div>



                        </div>

                    </div>



                </div>

                 /.container-fluid -->



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



</html>