<!DOCTYPE html>
<html lang="en">

<?php
include 'include.php';
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

                    <!-- Page Heading Projektory-->
                    <h1 class="h3 mb-2 text-gray-800">Admin Panel</h1>
                    <p class="mb-4">Administrátorský panel, který Vám umožňuje měnit statusy funkčnosti zařízení</p>

                    <!-- DataTales Example -->
                   <!--<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                        </div>
                       

                            <div class="table-responsive card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Problému</th>
                                            <th>Uživatel</th>
                                            <th>Třída</th>
                                            <th>Popis</th>
                                            <th>Stav</th>
                                            <th>Nahlášeno</th>
                                            <th>Editovat</th>
                                            <th>Popis změny</th>
                                            <th>Uložit</th>
                                            
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
                                            <th>Editovat</th>
                                            <th>Popis změny</th>
                                            <th>Uložit</th>
                                             
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
                                                echo " <tr> <form method='post' action='zmenit-status.php'>";
                                                    echo "<td id='cislo_problemu' name='cislo_problemu'>" . $row['id_problemu'] . "</td>
                                                        <input type='hidden' name='cislo_problemu' value='". $row['id_problemu'] ."'>"; // V jake ucebne se projektor nachazi
                                                  
                                                echo "<td>" . $row['id_uzivatel'] . "</td>";
                                                  
                                                    echo "<td>" . $row['trida'] . "</td>";

                                                echo "<td>" . $row['chyba'] . "</td>";
                                                    
                                                   
                                                    
                                                    if($row['status'] == "f"){
                                                        echo "<td>Nefunkční</td>";} 
                                                    else if($row['status'] == "z"){
                                                        echo "<td>V řešení...</td>";}
                                                    else if($row['status'] == "t"){
                                                         echo "<td>Funkční</td>";
                                                    }
                                                    
                                                    echo "<td>" . $row['vytvoreno'] . "</td>";


                                                echo "<td>


                                                    
                                                    <div class='dropdown  mb-5'>
                                                        <select class='custom-select' name='set_status' id=''>
                                                            <option value='1'" . ($row['status'] == 't' ? 'selected="selected"' : '') . ">Funkční</option>
                                                            <option value='2'" . ($row['status'] == 'f' ? 'selected="selected"' : '') . ">Nefunkční</option>
                                                            <option value='3'" . ($row['status'] == 'z' ? 'selected="selected"' : '') . ">Se závadou</option>
                                                           
                                                        </select>
                                                    </div>  
                                                    
                                                    </td>";

                                                echo "<td>

                                                    <div class='form-group'>
<<<<<<< Updated upstream
                                                        <textarea type='text' class='form-control' name='' id='' rows='5' placeholder='Popište prosím důvod provedené změny'></textarea>
=======
                                                        <textarea type='text' class='form-control' name='popis_reseni' id='popis_reseni' rows='5' placeholder='" . $row['popis_reseni'] ."'></textarea>
>>>>>>> Stashed changes
                                                    </div>


                                                </td>
                                                
                                                
                                                ";
                                               
                                                echo "<td>
                                                        <button class='btn btn-secondary' type='submit'>Potvrdit</button>
                                                     </td>
                                                    </tr>
                                                                                                              </form>";
                                            }
                                        }

                                    
                                      
                                        ?>
                                    </tbody>
                                </table>
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