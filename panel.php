<!DOCTYPE html>
<html lang="en">

<?php
include 'config.php';
include 'connection.php';
include 'footer.php';
include 'header.php';
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Křenka Služby- Projektory</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="">
                    <i class="fas fa-fw fa-wrench"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Křenka Služby</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-1">

            <!-- Nav Item - Přehled -->
            <li class="nav-item Show">
                <a class="nav-link" href="index.php">
                    <!--<i class="fas fa-fw fa-table"></i>-->
                    <span>PŘEHLED</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-1">

            <!-- Nav Item - Projektory -->
            <li class="nav-item active">
                <a class="nav-link" href="projektory.php">
                    <!--<i class="fas fa-fw fa-table"></i>-->
                    <span>PROJEKTORY</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-1">

            <!-- Nav Item - Tiskárny -->
            <li class="nav-item Show">
                <a class="nav-link" href="tiskarny.html">
                    <!--<i class="fas fa-fw fa-table"></i>-->
                    <span>TISKÁRNY</span></a>
            </li>

            

            <!-- Heading 
            <div class="sidebar-heading">
                Interface
            </div>

             Nav Item - Pages Collapse Menu 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

             Nav Item - Utilities Collapse Menu 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

             Divider 
            <hr class="sidebar-divider">

             Heading 
            <div class="sidebar-heading">
                Addons
            </div>

             Nav Item - Pages Collapse Menu 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

             Nav Item - Charts 
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

             Nav Item - Tables 
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

             Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message 
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
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

                    <!-- Page Heading Projektory-->
                    <h1 class="h3 mb-2 text-gray-800">Projektory</h1>
                    <p class="mb-4">Následující tabulka obsahuje přehled informací o jednotlivých projektorech v jednotlivých učebnách.</p>

                    <!-- DataTales Example -->
                   <!--<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Problému</th>
                                            <th>Uživatel</th>
                                            <th>Třída</th>
                                            <th>Popis</th>
                                            <th>Stav</th>
                                            <th>Nahlášeno</th>
                                            <th>Upravit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>ID Problému</th>
                                            <th>Uživatel</th>
                                            <th>Třída</th>
                                            <th>Popis</th>
                                            <th>Stav</th>
                                            <th>Nahlášeno</th>
                                             <th>Upravit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                      
                                        
                                        $sql = "select * from problemy r left join projektory p on p.id=r.id_projektor;";
                                        $result = mysqli_query($conn, $sql); // Use mysqli_query instead of mysql_query
                                        
                                        if (!$result) {
                                            if (DEBUG_MODE) {
                                                die("Query failed: " . mysqli_error($conn));
                                            }
                                        }

                                        $result_check = mysqli_num_rows($result);

                                        if ($result_check > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                    echo "<td>" . $row['id_problemu'] . "</td>"; // V jake ucebne se projektor nachazi
                                        
                                                echo "<td>" . $row['id_uzivatel'] . "</td>";
                                                  
                                                    echo "<td>" . $row['trida'] . "</td>";

                                                echo "<td>" . $row['chyba'] . "</td>";
                                                    
                                                   
                                                    
                                                    if($row['status'] == "f"){
                                                        echo "<th>Nevyřešeno</th>";} 
                                                    else if($row['status'] == "z"){
                                                        echo "<td>V řešení...</td>";}
                                                    else if($row['status'] == "t"){
                                                         echo "<td>Vyřešeno</td>";
                                                    }
                                                    
                                                    echo "<td>" . $row['vytvoreno'] . "</td>";


                                                echo "<td>
                                                    
                                                  <form method='post'>
                                                      <input type='hidden' name='problem_id' value='" . $row['id_problemu'] . "' />
                                                      <input type='submit' name='button1' class='btn btn-secondary' value='Vyřešeno' /> 
                                                  </form>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    </td>";
                                               
                                                echo "</tr>";
                                            }
                                        }

                                        // Close the database connection if needed
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


    <!--FOOTER-->
                <?php

                     footer();
                
                ?>
    <!--END-FOOTER-->    

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>