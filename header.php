
<?php

require_once 'config.php';
//require_once 'index.php';


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
                    <ul class='navbar-nav ml-auto'>


                        <!-- Link Potřebujete poradit? -->
                        <div class='nav-item mx-1 no-arrow dropdown'>

                            <a class='text-gray-600 nav-link dropdown-toggle' href='dokumentace.php'>
                                <i class='fa fa-lightbulb'></i>
                                &nbsp; Potřebujete poradit?
                            </a>


                        </div>


                        <!-- Nav Item - Upozornění -->

                        <li class='nav-item dropdown no-arrow mx-1'>


                            <a class='nav-link dropdown-toggle' href='#' id='alertsDropdown' role='button'
                               data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>

                                <i class='fas fa-bell fa-fw'></i>

                                <!-- Counter - Upozornění -->

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
                                <span class='mr-2 d-none d-lg-inline text-gray-600 small'>". $_SESSION['user_name'] ."</span>
                                <img class='img-profile rounded-circle'
                                     src=". $_SESSION['user_avatar'] .">

                            </a>

                            <!-- Dropdown - Informace o uživateli -->

                            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
                                 aria-labelledby='userDropdown'>


                                <a class='dropdown-item' href='#' data-toggle='modal' data-target=''>

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



            <!-- Divider

            <hr class='sidebar-divider my-1'>

            <!-- Nav Item - Tiskárny ";

    echo ($_SERVER['REQUEST_URI'] == "/tiskarny.php") ? "<li class='nav-item active'>" : "<li class='nav-item show'>";

    global $App_Version;
    echo "
                <a class='nav-link' href='tiskarny.php'>
                    <!--<i class='fas fa-fw fa-table'></i>

                    <span>TISKÁRNY</span></a>

            </li>

            <li class='nav-item Show text-gray-400 text-center d-sm-inline-block'>

                    <small class='version'>Verze aplikace: ". $App_Version . "</small>

            </li>



            <!-- Heading

            <div class='sidebar-heading'>

                Interface

            </div>



             Nav Item - Pages Collapse Menu

            <li class='nav-item'>

                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo'

                    aria-expanded='true' aria-controls='collapseTwo'>

                    <i class='fas fa-fw fa-cog'></i>

                    <span>Components</span>

                </a>

                <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>

                    <div class='bg-white py-2 collapse-inner rounded'>

                        <h6 class='collapse-header'>Custom Components:</h6>

                        <a class='collapse-item' href='buttons.html'>Buttons</a>

                        <a class='collapse-item' href='cards.html'>Cards</a>

                    </div>

                </div>

            </li>



             Nav Item - Utilities Collapse Menu

            <li class='nav-item'>

                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities'

                    aria-expanded='true' aria-controls='collapseUtilities'>

                    <i class='fas fa-fw fa-wrench'></i>

                    <span>Utilities</span>

                </a>

                <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities'

                    data-parent='#accordionSidebar'>

                    <div class='bg-white py-2 collapse-inner rounded'>

                        <h6 class='collapse-header'>Custom Utilities:</h6>

                        <a class='collapse-item' href='utilities-color.html'>Colors</a>

                        <a class='collapse-item' href='utilities-border.html'>Borders</a>

                        <a class='collapse-item' href='utilities-animation.html'>Animations</a>

                        <a class='collapse-item' href='utilities-other.html'>Other</a>

                    </div>

                </div>

            </li>



             Divider

            <hr class='sidebar-divider'>



             Heading

            <div class='sidebar-heading'>

                Addons

            </div>



             Nav Item - Pages Collapse Menu

            <li class='nav-item'>

                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePages'

                    aria-expanded='true' aria-controls='collapsePages'>

                    <i class='fas fa-fw fa-folder'></i>

                    <span>Pages</span>

                </a>

                <div id='collapsePages' class='collapse' aria-labelledby='headingPages' data-parent='#accordionSidebar'>

                    <div class='bg-white py-2 collapse-inner rounded'>

                        <h6 class='collapse-header'>Login Screens:</h6>

                        <a class='collapse-item' href='login.html'>Login</a>

                        <a class='collapse-item' href='register.html'>Register</a>

                        <a class='collapse-item' href='forgot-password.html'>Forgot Password</a>

                        <div class='collapse-divider'></div>

                        <h6 class='collapse-header'>Other Pages:</h6>

                        <a class='collapse-item' href='404.html'>404 Page</a>

                        <a class='collapse-item' href='blank.html'>Blank Page</a>

                    </div>

                </div>

            </li>



             Nav Item - Charts

            <li class='nav-item'>

                <a class='nav-link' href='charts.html'>

                    <i class='fas fa-fw fa-chart-area'></i>

                    <span>Charts</span></a>

            </li>



             Nav Item - Tables

            <li class='nav-item'>

                <a class='nav-link' href='tables.html'>

                    <i class='fas fa-fw fa-table'></i>

                    <span>Tables</span></a>

            </li>



             Divider -->

            <hr class='sidebar-divider d-none d-md-block'>


            <!-- Verzování -->
            <li class='nav-item Show text-gray-400 text-center d-sm-inline-block'>

                    <small class='version'>Verze aplikace: ". $App_Version ."</small>

            </li>


            <!-- Sidebar Toggler (Sidebar) -->

            <div class='text-center d-none d-md-inline'>

                <button class='rounded-circle border-0' id='sidebarToggle'></button>

            </div>



            <!-- Sidebar Message

            <div class='sidebar-card d-none d-lg-flex'>

                <img class='sidebar-card-illustration mb-2' src='img/undraw_rocket.svg' alt='...'>

                <p class='text-center mb-2'><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>

                <a class='btn btn-success btn-sm' href='https://startbootstrap.com/theme/sb-admin-pro'>Upgrade to Pro!</a>

            </div> -->





        </ul>";
}

function draw_admin_sidebar()
{
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

            <!-- Nav Item - Přehled -->
            <li class='nav-item active'>

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

            <!-- Nav Item - Tiskárny -->
            <li class='nav-item Show'>
                <a class='nav-link' href='tiskarny.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>TISKÁRNY</span></a>

            </li>

            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Přidat Zařízení-->
            <li class='nav-item Show'>
                <a class='nav-link' href='pridat-zarizeni.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PŘIDAT ZAŘÍZENÍ</span></a>

            </li>

            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Panel-->
            <li class='nav-item Show'>
                <a class='nav-link' href='panel.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>PANEL</span></a>

            </li>

            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Dokumentace-->
            <li class='nav-item Show'>
                <a class='nav-link' href='dokumentace.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>DOKUMENTACE</span></a>

            </li>

            <!-- Divider-->

            <hr class='sidebar-divider my-1'>

            <!--Nav Item - Dokumentace-->
            <li class='nav-item Show'>
                <a class='nav-link' href='oznameni.php'>
                    <!--<i class='fas fa-fw fa-table'></i>-->

                    <span>OZNÁMENÍ</span></a>

            </li>



            <!--Divider -->
            <hr class='sidebar-divider d-none d-md-block'>


            <!-- Verzování -->
            <li class='nav-item Show text-gray-400 text-center d-sm-inline-block'>

                    <small class='version'>Verze aplikace: 1.1.1</small>

            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class='text-center d-none d-md-inline'>
                <button class='rounded-circle border-0' id='sidebarToggle'></button>
            </div>








        </ul>

        <!-- End of Sidebar -->"

;}

?>
