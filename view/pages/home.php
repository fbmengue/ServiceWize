<?php

session_start();

//HEADER / NAVBAR
include __DIR__ . '/../widgets/navbar.php';

?>

<section class="d-flex flex-column align-items-center pt-4 pb-8 bg-default main-content">

    <!-- ADD WELCOME WIDGET -->
    <div class="d-flex flex-column w-100 align-items-center bg-white rounded-2 " style="max-width: 1070px">
        <div class="container-sm d-flex">
            <div class="profile">
                <div class="welcome-container">
                    <div class="name">
                        <p class="title-label">Welcome back,</p>
                        <p class="name-label"><?php echo $_SESSION["userName"] . " " . $_SESSION["userLastName"] ?> </p>
                    </div>
                    <div class="balance">
                        <p class="title-label" translate="">overall balance</p>
                        <p class="title-label">€ <strong class="balance-value"></strong>
                    </div>
                    <div class="info-list">
                        <div class="info-label amount">
                            <p class="title" translate="">monthly earning</p>
                            <p class="amount earning">€ 189,30</p>
                        </div>
                        <div class="info-label amount">
                            <p class="title" translate="">monthly services</p>
                            <p class="amount expense">€ -1.367,20</p>
                        </div><a class="info-label report" href="">
                            <i class="icon-report"></i>
                            <p translate="" class="">see reports</p>
                        </a>
                    </div>
            </div>
            <div class="quick-add-menu">
                <h2 class="widget-title" translate="">Quick add</h2>
                <ul class="btn-list">
                    <li class="btn-action"><a href="" class="appointment">
                        <i class="icon-expense-dashboard"></i>
                            <p class="btn-title " translate="">Appointment</p>
                        </a></li>
                    <li class="btn-action"><a href="" class="service">
                        <i class="icon-earning-dashboard"></i>
                            <p class="btn-title " translate="">Service</p>
                        </a></li>
                    <li class="btn-action"><a href="" class="category">
                        <i class="icon-transfer-dashboard"></i>
                            <p class="btn-title " translate="">Category</p>
                        </a></li>
                    <li class="btn-action"><a href="" class="import">
                        <i class="icon-import-dashboard"></i>
                            <p class="btn-title " translate="">IMPORT</p>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ADD CALENDAR WIDGET -->
    <div class="d-flex flex-column w-100 align-items-center bg-white rounded-2 bg-box-shadow-calendar"
        style="max-width: 1070px">
        <?php
        include __DIR__ . '/../widgets/calendar-week-teste.php';
        ?>
    </div>

    <div class="container" style="max-width: 1070px;">
        <div class="row">
            <div class="col-sm-6 pe-2 ps-0">
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>


            </div>
            <div class="col-sm-6 ps-2 ps-0">
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home<h1>home</h1>
                    </h1>
                    <p>AECTEP - ASDASDIh</p>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
                <div class="col-sm-12 bg-white mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h1>home</h1>
                </div>
            </div>
        </div>
    </div>








    <footer class="mt-7 mb-4">
        <p class="m-0 text-secondary text-sm">footer
            <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
        </p>
    </footer>
</section>
