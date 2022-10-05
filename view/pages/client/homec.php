<?php

session_start();

//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

?>



<section class="d-flex flex-column align-items-center pt-4 pb-8 bg-default main-content">




    <!-- ADD WELCOME WIDGET -->
    <div class="d-flex flex-column w-100 align-items-center rounded-2 " style="max-width: 1070px">
        <div class="w-100 p-3 bg-widget pt-3">
            <div class="profile d-flex flex-row pt-1 justify-content-between">
                <div class="welcome-container d-flex flex-wrap flex-row justify-content-between">
                    <div class="name w-50 d-flex flex-column">
                        <p class="title-label">Welcome back,</p>
                        <p class="name-label"><?php echo $_SESSION["userFullName"] ?> </p>
                    </div>
                    <div class="balance w-50 flex-column">
                        <p class="title-label" translate="">overall balance</p>
                        <p class="title-label">€ <strong class="balance-value"></strong>
                    </div>
                    <div class="info-list d-flex w-100 flex-row justify-content-between">
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
                    <h2 class="widget-title" translate="">New adds</h2>
                    
                </div>
            </div>
        </div>
        <!-- ADD CALENDAR WIDGET -->
        <div class="d-flex flex-column w-100 align-items-center bg-white rounded-2 bg-box-shadow-calendar"
            style="max-width: 1070px">
            <?php

            include __DIR__ . '/../widgets/calendar-homeView.php';
            ?>
        </div>



        <div class="container" style="max-width: 1070px;">
            <div class="row">
                <div class="col-sm-6 pe-2 ps-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <?php
                        include __DIR__ . '/../widgets/widgetInfoACSPreview.php';
                        ?>
                    </div>
                    <div class="col-sm-12 d-flex flex-column bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <h1>Client Home</h1>
                    </div>
                    


                </div>
                <div class="col-sm-6 ps-2 ps-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <h1>home<h1>home</h1>
                        </h1>
                        <p>AECTEP - ASDASDIh</p>
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
