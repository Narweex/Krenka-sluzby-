<?php 
function draw_modal()
{
    echo"<!-- Logout Modal-->

    <div class='modal fade' id='logoutModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
        aria-hidden='true'>

        <div class='modal-dialog' role='document'>

            <div class='modal-content'>

                <div class='modal-header'>

                    <h5 class='modal-title' id='exampleModalLabel'>Odhlásit se?</h5>

                    <button class='close' type='button' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span>

                    </button>

                </div>

                <div class='modal-body'>Pro odhlášení klikněte na 'Odhlásit.'</div>

                <div class='modal-footer'>

                    <button class='btn btn-secondary' type='button' data-dismiss='modal'>Zrušit</button>

                    <a class='btn btn-primary' href='logout.php'>Odhlásit</a>

                </div>

            </div>

        </div>

    </div>";
}
?>