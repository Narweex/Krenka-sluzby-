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

    <title>Křenka Služby- Oznámení</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

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
                    <h1 class="h3 mb-4 text-gray-800">Oznámení</h1>

                    <!-- List Oznámení-->
                    <div class="list-group">

                        <?php

                        if(!$conn){
                            die("Could not establish connection");
                        }

                        $sql = "SELECT * FROM oznameni o LEFT JOIN problemy p ON o.id_problemu = p.id_problemu LEFT JOIN projektory pr ON p.id_projektor = pr.id ORDER BY o.id DESC;";

                        $result = mysqli_query($conn, $sql);

                        if(!$result){
                            if (DEBUG_MODE) {

                                die("Query failed: " . mysqli_error($conn));

                            }
                        }

                        $result_check = mysqli_num_rows($result);
                        if($result_check > 0){
                           while($row = mysqli_fetch_assoc($result)){

                               switch($row['zmena']){

                                   case "t":
                                        $row['zmena'] = "<b class='text-success'>Funkční</b>";
                                        break;
                                   case "z":
                                        $row['zmena'] = "<em class='text-warning'>V opravě</em>";
                                        break;
                                   case "f":
                                        $row['zmena'] = "<b class='text-danger'>Nefunkční</b>";
                                        break;
                                   default:
                                        $row['zmena'] = "Chyba";
                                        break;
                               }

                                echo "
                                         <a href='#' class='list-group-item list-group-item-action flex-column align-items-start'>
                                        <div class='d-flex w-100 justify-content-between'>
                                        <small class='text-muted'>" . $row['cas'] . "</small>
                                         </div>

                                         <p class='mb-1'>Zařízení <u>" . $row['typ'] . "</u> v <u>" . $row['trida'] . "</u> bylo označeno jako <b>" . $row['zmena'] . "</b> </p>
                                        </a>";

                           }
                        }




                        ?>


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

</body>

</html>