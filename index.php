<!DOCTYPE html>


<html lang="en">


<?php

include 'include.php';

// Kontrola zda web dostal "code" od google api
if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']); //access token pro uživatele

    $client->setAccessToken($token['access_token']);

    $_SESSION['user_token'] = $token; // uložení access token od uživatele do session

    // Načtení informací o uživateli z google

    $google_oauth = new Google_Service_Oauth2($client);

    $google_account_info = $google_oauth->userinfo->get();

    $userinfo = [

        'email' => $google_account_info['email'],

        'jmeno' => $google_account_info['name'],

        'avatar' => $google_account_info['picture'],

        'verifiedEmail' => $google_account_info['verifiedEmail'],

        'token' => $google_account_info['id'],

    ];

    $sql = "SELECT * FROM uzivatele WHERE email ='{$userinfo['email']}'";   //kontrole jestli uživatel není zaregistrovaný pod mailem

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        // uživatel existuje

        $_SESSION = mysqli_fetch_assoc($result);

        $token = $_SESSION['google_id']; //načtení google ID uživatele do session

    } else {
        // uživatel neexistuje zapíšeme jej do databáze

        $sql = "INSERT INTO uzivatele (id, jmeno, avatar, email, google_id, session, user_group) VALUES ('', '{$userinfo['jmeno']}', '{$userinfo['avatar']}', '{$userinfo['email']}', '{$userinfo['token']}', '0', '')";

        $result = mysqli_query($conn, $sql);

        if ($result) {

            $token = $userinfo['token'];

        } else {

            echo "User is not created";

            die();
        }
    }
    //Načtení kompletních údajů o uživateli do session
    $sql = "SELECT * FROM uzivatele WHERE email ='{$userinfo['email']}'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $UID = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $UID['id'];
        $_SESSION['user_group'] = $UID['user_group'];
    }

    $_SESSION['user_token'] = $token;

    $_SESSION['user_name'] = $userinfo['jmeno'];

    $_SESSION['user_avatar'] = $userinfo['avatar'];

    $_SESSION['user_email'] = $userinfo['email'];

    //po autentifikaci může být uživatel přesměrován na index
    header("Location: index.php");


} else {//pokud uživatel nemá token od googlu pošleme jej na login

    if (!isset($_SESSION['user_token'])) {

        header("Location: login.php");

        die();

    }


}


?>
<head>

    <link href='https://svatkyapi.cz/api/day'>





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



    <link href="css/sb-admin-2.min.css" rel="stylesheet" />







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



                <?php



                draw_topbar();



                ?>



                <!-- End of Topbar -->







                <!-- Begin Page Content -->



                <div class="container-fluid">







                    <!--Heading-Projektory -->



                    <div class="d-sm-flex align-items-center justify-content-between mb-4">



                        <h1 class="h3 mb-0 text-gray-800"> Projektory </h1>



                        <?php





                        if (!$conn) {

                            if (DEBUG_MODE) {

                                die("Spojení selhalo: " . mysqli_connect_error());

                            }

                            die();

                        }



                        if (DEBUG_MODE) {

                            echo "Připojeno k databázi <br>";

                            echo "Avatar: " . $_SESSION['user_avatar'] . "<br>";

                            echo "Jméno: " . $_SESSION['user_name'] . "<br>";

                            echo "Email: " . $_SESSION['user_email'] . "<br>";

                            echo "ID uživatele: " . $_SESSION['user_id'] . "<br>";

                            echo "Práva uživatele: " . $_SESSION['user_group'] . "<br>";

                            echo "Server name: " . $_SERVER['SERVER_NAME'] . "<br>";

                        }





                        $today = date("d.m.Y");



                        echo "Dnes je " . $today . "<br>";

                        echo  "Svátek má: " . $api_svatek;

                        ?>

                        <!--<img src="<?= $_SESSION['user_avatar'] ?>" alt="" width="90px" height="90px" />

                        <ul>

                            <li>Full Name: <?= $_SESSION['user_name'] ?></li>

                            <li>Email Address: <?= $_SESSION['user_email'] ?></li>

                            <li>Email Address: <?= $_SESSION['id'] ?></li>

                           

                            <li><a href="logout.php">Logout</a></li>

                        </ul>-->

                        <!--</div>-->











                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i

                            class="fas fa-envelope fa-sm text-white-50"></i> Nahlásit problém</a>-->







                    </div>


                    <!-- Content Row -->
                    <div class="row">



                        <!--Card- Funkční Projektory-->



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





                                            <div class="h5 mb-0 font-weight-bold text-success">

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







                        <!--Card Se Závadou Projektory-->



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

                                            <div class="h5 mb-0 font-weight-bold text-danger">

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


                        <!--Card- Probíhá oprava Projektory-->


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



                                                    $sql = "SELECT p.id, p.nazev, p.trida, r.status, r.vytvoreno FROM projektory p LEFT JOIN problemy r ON r.id_projektor = p.id WHERE (r.status IS NOT NULL AND r.status = 'z' AND (r.id_projektor, r.vytvoreno) IN ( SELECT id_projektor, MAX(vytvoreno) AS max_created_at FROM problemy WHERE status = 'z' GROUP BY id_projektor )) ORDER BY p.id, r.vytvoreno DESC;";



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



                                            <div class="h5 mb-0 font-weight-bold text-warning">

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



    <!-- Logout Modal -->
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