<?php

use controller\AppointmentContr;

session_start();
//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

$hoje = date('Y-m-d', time());


if (true) {
    //Get dados
    $calendarDate = $_GET["date"];



    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/appointment.classe.php';
    include __DIR__ . '/../../../controller/appointment-contr.classes.php';

    //New appointment list by date
    $newAppointmentList = new AppointmentContr();

    //Roda erros
    $appointmentDayList = $newAppointmentList->getAppointmentListByDate($calendarDate);






    ?>
<section class="d-flex flex-column align-items-center pt-0 pb-8 bg-default main-content">


    <!-- ADD CALENDAR WIDGET -->
    <div id="dayViewHeader" class="d-flex flex-column w-100 align-items-center bg-white /*bg-box-shadow-calendar*/"
        style="max-width: 1070px">

        <div class="container mobile-container-calendar">
            <div class="navbar-week-header">
                <div class="next-prev d-flex justify-content-center">
                    <h2 class="widget-title" translate="">Admin Setup</h2>

                </div>

            </div>

            <div class="navbar-days d-flex flex-row text-center justify-content-center align-items-center">
                <label for="" class="widget-title" style="margin-right: 10px;">Select:</label>
                <div class="" style="width: 350px;">

                    <select name="adminSetupSelect" id="adminSetupSelect" onchange="loadAdminSetup(this);return false;"
                        class="form-control">
                        <option value=""></option>
                        <option value="professionals">Professionals</option>
                        <option value="clients">Clients</option>
                        <option value="services">Services</option>
                        <option value="appointments">Appointments</option>
                    </select>
                </div>

            </div>
        </div>
    </div>
    </div>

    <div class="container" id="dayViewContent" style="max-width: 1070px;">
        <div class="row">
            <div class="col-sm-12 pe-2 ps-2">

                <span id="messageAdminSetup" class="d-flex justify-content-center mt-2"></span>

                <div id="divAdminSetup" style="text-align: center;" class="appointment-dayview-service ">
                    <h5><?php echo 'No Data Selected'; ?></h5>
                </div>
                <div id="divAdminSetupFilter" style="text-align: center;" class="appointment-dayview-service ">

                </div>


                <?php
} ?>



            </div>
        </div>
    </div>





    <footer class="mt-7 mb-4">
        <p class="m-0 text-secondary text-sm">footer
            <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
        </p>
    </footer>
</section>