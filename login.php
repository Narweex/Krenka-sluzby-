<?php

require_once 'include.php';


if (isset($_SESSION['session_id'])) {

    header("Location: index.php");

} 
?>

<!DOCTYPE html> 
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Křenka Služby- Přihlásit se</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="body">

    <!--Page wrapper-->
    <div id="wrapper">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="text-center mt-3">
                    
                    <!-- Heading Vítejte -->
                    
                    <h1 class="text-gray-800 h1">Vítejte na Křenka Službách!</h1>

                    <!--Subheading Přihlašte se-->
                    <p class="text-gray-700">Pro přihlášení pomocí Vašeho @gymkren.cz e-mailu klikněte na tlačítko níže</p>
                    
                    <!-- Button Přihlásit-->
                    

                    <?php

                    echo " <a href='" . $client->createAuthUrl() . "' class='btn btn-primary my-3'>
                        <span class='text'>Přihlásit</span>
                        </a>"
                    ?>

                    

                </div>

                
                

            </div>

            
    
    </div>
<!-- Footer -->
                <?php
                footer();
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