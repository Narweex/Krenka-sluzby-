

<?php

include 'config.php';
include 'connection.php';


function draw_topbar()
{

    echo "
 <!-- Topbar -->

                <nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>



                    <!-- Sidebar Toggle (Topbar) -->

                    <button id='sidebarToggleTop' class='btn btn-link d-md-none rounded-circle mr-3'>

                        <i class='fa fa-bars'></i>

                    </button>

                    <!-- Button Nahlásit Problém -->
                    <a href='nahlasit-problem.php' class='btn btn-secondary '>
                        <span class='icon text-white-50'>

                        </span>
                        <span class='text'>Nahlásit problém</span>
                    </a>



                    <!-- Topbar Navbar -->
                    <ul class='navbar-nav ml-auto'>";

                    if (DEVELOPER_MODE) {
                        echo "
                                <!--Heading Dev Environment-->
                                <div class='d-none d-sm-inline-block nav-item'>
                                    <div class='nav-link text-gray-600'>Dev Environment</div>

                                </div>";

                    }

                    echo

                        "<!-- Link Potřebujete poradit? -->
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

                                <!-- Counter - Upozornění -->";

                                global $conn;

                        if(!$conn){
                           die("Could not establish connection");
                        }

                        $sql = "SELECT * FROM oznameni o LEFT JOIN problemy p ON o.id_problemu = p.id_problemu LEFT JOIN projektory pr ON p.id_projektor = pr.id ORDER BY o.id DESC ;";

                        $result = mysqli_query($conn, $sql);

                        if(!$result){
                            if (DEBUG_MODE) {

                                die("Query failed: " . mysqli_error($conn));

                            }
                        }

                        $result_check = mysqli_num_rows($result);

                        if($result_check <= 3){
                            $counter_number = $result_check;
                        }
                        else if($result_check > 3){
                            $counter_number = "3+";
                        };





                        echo"
                                <span class='badge badge-danger badge-counter'>" . $counter_number . "</span>

                            </a>

                            <!-- Dropdown - Upozornění -->

                            <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='alertsDropdown'>

                            <h6 class='dropdown-header'>
                                        Oznámení
                                    </h6>";
    global $conn;

                        if(!$conn){
                           die("Could not establish connection");
                        }

                        $sql = "SELECT * FROM oznameni o LEFT JOIN problemy p ON o.id_problemu = p.id_problemu LEFT JOIN projektory pr ON p.id_projektor = pr.id ORDER BY o.id DESC limit 3;";

                        $result = mysqli_query($conn, $sql);

                        if(!$result){
                            if (DEBUG_MODE) {

                                die("Query failed: " . mysqli_error($conn));

                            }
                        }

                        $result_check = mysqli_num_rows($result);

                        if($result_check > 0){


                           while($row = mysqli_fetch_assoc($result) ){

                               switch($row['zmena']){

                                   case "t":
                                        $row['zmena'] = "<b class='text-success'>Funkční</b>";
                                        break;
                                   case "z":
                                        $row['zmena'] = "<b class='text-warning'>V opravě</b>";
                                        break;
                                   case "f":
                                        $row['zmena'] = "<b class='text-danger'>Nefunkční</b>";
                                        break;
                                   default:
                                        $row['zmena'] = "Chyba";
                                        break;
                               }


                                echo
                                "

                                <a class='dropdown-item d-flex align-items-center' href='#'>

                                    <div>

                                        <div class='d-flex w-100 justify-content-between'>
                                            <small class='text-muted'>" .$row['cas'] . "</small>
                                        </div>
                                        <p class='mb-1'>Zařízení <u>" . $row['typ'] . "</u> v&#160místnosti <u>". $row['trida'] ."</u> bylo označeno jako " . $row['zmena'] . "</p>

                                    </div>

                                </a>

                                    ";



                           }
                        }








                               echo"
                                <a class='dropdown-item text-center small text-gray-500' href='oznameni.php'>Všechna oznámení</a>
                            </div>

                        </li>


                        <!-- Nav Item - Informace o uživateli -->
                        <li class='nav-item dropdown no-arrow'>

                            <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button'
                               data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class='mr-2 d-none d-lg-inline text-gray-600 small'>". $_SESSION['user_name'] ."</span>
                                <img class='img-profile rounded-circle'
                                     src=". $_SESSION['user_avatar'] .">

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

                <!-- End of Topbar --> ";
}

function draw_sidebar()
{

    if ($_SESSION['user_group'] == 0) {

        echo "
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

            <!-- Nav Item - Přehled -->";






        echo ($_SERVER['REQUEST_URI'] == "/index.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";

        echo "

                <a class='nav-link' href='index.php'>

                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PŘEHLED</span></a>

            </li>



            <!-- Divider -->

            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Projektory -->";

        echo ($_SERVER['REQUEST_URI'] == "/projektory.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";


        echo "
                <a class='nav-link' href='projektory.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PROJEKTORY</span></a>

            </li>


            <!-- Divider -->

            <hr class='sidebar-divider my-1'>


            <!--Nav Item - Oznámení-->";
            echo ($_SERVER['REQUEST_URI'] == "/oznameni.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";
              echo  "<a class='nav-link' href='oznameni.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>OZNÁMENÍ</span></a>

            </li>


            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Dokumentace-->";
            echo ($_SERVER['REQUEST_URI'] == "/dokumentace.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";
             echo   "<a class='nav-link' href='dokumentace.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>DOKUMENTACE</span></a>

            </li>



            <!-- Divider -->

            <hr class='sidebar-divider my-1'>


            <!-- Nav Item - Kontakt -->";

        echo ($_SERVER['REQUEST_URI'] == "/kontakt.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";


        echo "
                <a class='nav-link' href='kontakt.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>KONTAKT</span></a>

            </li>



            <!-- Divider

            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Tiskárny ";

        echo ($_SERVER['REQUEST_URI'] == "/tiskarny.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";

        global $App_Version;
        echo "
                <a class='nav-link' href='tiskarny.php'>
                    <!--<i class='fas fa-fw fa-table'></i>

                    <span>TISKÁRNY</span></a>

            </li>-->







             <!--Divider -->

             <hr class='sidebar-divider my-1'>


            <!-- Verzování -->
            <li class='nav-item Show text-gray-400 text-center d-sm-inline-block'>

                    <small class='version'>Verze aplikace: " . $App_Version . "</small>

            </li>


            <!-- Sidebar Toggler (Sidebar) -->

            <div class='text-center d-none d-md-inline'>

                <button class='rounded-circle border-0' id='sidebarToggle'></button>

            </div>





        </ul>";

    }









    else if($_SESSION['user_group'] == 1||2){
        echo "
    <!-- Sidebar -->

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

            <!-- Nav Item - Přehled -->";
            echo ($_SERVER['REQUEST_URI'] == "/index.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";

               echo "<a class='nav-link' href='index.php'>

                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PŘEHLED</span></a>

            </li>



            <!-- Divider -->

            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Projektory -->";
    echo ($_SERVER['REQUEST_URI'] == "/projektory.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";

    echo "
            <a class='nav-link' href='projektory.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PROJEKTORY</span></a>

            </li>


            <!-- Divider -->

            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Tiskárny -->";
            echo ($_SERVER['REQUEST_URI'] == "/tiskarny.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";
               echo "<a class='nav-link' href='tiskarny.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>TISKÁRNY</span></a>

            </li>


            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Přidat Zařízení-->";
            echo ($_SERVER['REQUEST_URI'] == "/pridat-zarizeni.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";
              echo  "<a class='nav-link' href='pridat-zarizeni.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PŘIDAT ZAŘÍZENÍ</span></a>

            </li>

            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Panel-->";
            echo ($_SERVER['REQUEST_URI'] == "/admin-panel/www/") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";
              echo  "<a class='nav-link' href='/admin-panel/www/'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PANEL</span></a>

            </li>

            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Dokumentace-->";
            echo ($_SERVER['REQUEST_URI'] == "/dokumentace.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";
             echo   "<a class='nav-link' href='dokumentace.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>DOKUMENTACE</span></a>

            </li>

            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Oznámení-->";
            echo ($_SERVER['REQUEST_URI'] == "/oznameni.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";
              echo  "<a class='nav-link' href='oznameni.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>OZNÁMENÍ</span></a>

            </li>



            <!--Divider -->
            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Kontakt -->";

    echo ($_SERVER['REQUEST_URI'] == "/kontakt.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";


    echo "
                <a class='nav-link' href='kontakt.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>KONTAKT</span></a>

            </li>

            <!--Divider -->
            <hr class='sidebar-divider my-1'>


            <!-- Nav Item - Přidat Kontakt -->";

    echo ($_SERVER['REQUEST_URI'] == "/pridat-kontakt.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";


    echo "
                <a class='nav-link' href='pridat-kontakt.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PŘIDAT KONTAKT</span></a>

            </li>

            <!--Divider -->
            <hr class='sidebar-divider my-1'>";

            global $App_Version;

        echo "
            <!-- Verzování -->
            <li class='nav-item Show text-gray-400 text-center d-sm-inline-block'>

                <small class='version'>Verze aplikace: " . $App_Version . "</small>

            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class='text-center d-none d-md-inline'>
                <button class='rounded-circle border-0' id='sidebarToggle'></button>
            </div>








        </ul>

        <!-- End of Sidebar -->";
    }

}



?>
