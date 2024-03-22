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

        <?php

        draw_sidebar();

        ?>

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
                                            <th>Učebna</th>
                                            <th>Status</th>
                                            <th>Chybové hlášení</th>
                                            <th>Řešení</th>
                                            <th>Datum nahlášení problému</th>
                                            <th>Konektor</th>
                                            <th>Bezdrátový</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Učebna</th>
                                            <th>Status</th>
                                            <th>Chybové hlášení</th>
                                            <th>Řešení</th>
                                            <th>Datum nahlášení problému</th>
                                            <th>Konektor</th>
                                            <th>Bezdrátový</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                      
                                        
                                        $sql = "SELECT * FROM projektory pr LEFT JOIN problemy p ON p.id_projektor = pr.id left join konektory k on pr.konektor=k.id GROUP BY pr.id order by vytvoreno DESC;";
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
                                                    echo "<td>" . $row['trida'] . "</td>"; // V jake ucebne se projektor nachazi

                                                    if($row['status'] == "f"){
                                                        echo "<td>Nefunkční</td>";
                                                    } 
                                                    if($row['status'] == "z"){
                                                        echo "<td>Probíhá oprava</td>";
                                                    }
                                                    else if($row['status'] != "f"){
                                                        echo "<td>Funkční</td>";
                                                    }
                                                  
                                                    echo "<td>" . $row['chyba'] . "</td>";
                                                  
                                                    echo "<td>" . $row['popis_reseni'] . "</td>";


                                                echo "<td>" . $row['vytvoreno'] . "</td>";
                                                    
                                                    echo "<td>" . $row['typ'] . "</td>";
                                                    
                                                    if($row['bezdratovy'] == "f"){
                                                        echo "<td>Ne</td>";} 
                                                    else if($row['bezdratovy'] != "f"){
                                                        echo "<td>Ano</td>";}

                                               
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>