<?php

use controller\AppointmentContr;

session_start();
//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

$hoje = date('Y-m-d', time());


if (isset($_GET["date"])) {
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
    <div class="d-flex flex-column w-100 align-items-center bg-white /*bg-box-shadow-calendar*/"
        style="max-width: 1070px">
        <?php
            include __DIR__ . '/../../widgets/calendar-week-teste.php';
        ?>
    </div>

    <div class="container" style="max-width: 1070px;">
        <div class="row">
            <div class="col-sm-12 pe-2 ps-2">
                <?php foreach ($appointmentDayList as $dayItem) {
                        $startTime = substr($dayItem['appointmentStartTime'], 0, -3);
                        $endTime = substr($dayItem['appointmentEndTime'], 0, -3);
                    ?>
                <div class="appointment-dayview col-sm-12 bg-widget mt-3 p-3 rounded-3 /*bg-box-shadow-thin*/">
                    <div class="row">
                        <div class="appointment-dayview-header col-sm-12 d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div
                                    class="<?php echo ($calendarDate < $hoje) ?  "appointment-circle-pass" : "appointment-circle-future"; ?>">
                                </div>
                                <div>
                                    <?php echo $startTime . " - " . $endTime ?>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="appointment-dot-actions"></div>
                            </div>
                        </div>
                        <div class="appointment-dayview-service col-sm-12">
                            <h5><?php echo $dayItem['serviceName']; ?></h5>
                        </div>
                        <div class="appointment-dayview-client col-sm-12">
                            <div><?php echo $dayItem['clientFullName']; ?></div>
                        </div>
                    </div>

                </div>


                <?php } ?>



            </div>
        </div>
    </div>





    <footer class="mt-7 mb-4">
        <p class="m-0 text-secondary text-sm">footer
            <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
        </p>
    </footer>
</section><?php
} else {
    //Get dados
    $_GET["date"] = date('Y-m-d', time());
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
    <div class="d-flex flex-column w-100 align-items-center bg-white /*bg-box-shadow-calendar*/"
        style="max-width: 1070px">
        <?php
            include __DIR__ . '/../../widgets/calendar-week-teste.php';
        ?>
    </div>
    
    <div class="container" style="max-width: 1070px;">
        <div class="row">
            <div class="col-sm-12 pe-2 ps-2">
                <?php foreach ($appointmentDayList as $dayItem) {
                        $startTime = substr($dayItem['appointmentStartTime'], 0, -3);
                        $endTime = substr($dayItem['appointmentEndTime'], 0, -3);
                    ?>
                <div class="appointment-dayview col-sm-12 bg-widget mt-3 p-3 rounded-3">
                    <div class="row">
                        <div class="appointment-dayview-header col-sm-12 d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div
                                    class="<?php echo ($calendarDate < $hoje) ? "appointment-circle-pass" : "appointment-circle-future"; ?>">
                                </div>
                                <div>
                                    <?php echo $startTime . " - " . $endTime ?>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="appointment-dot-actions"></div>
                            </div>
                        </div>
                        <div class="appointment-dayview-service col-sm-12">
                            <h5><?php echo $dayItem['serviceName']; ?></h5>
                        </div>
                        <div class="appointment-dayview-client col-sm-12">
                            <div><?php echo $dayItem['clientFullName']; ?></div>
                        </div>
                    </div>

                </div>


                <?php } ?>



            </div>
        </div>
    </div>





    <footer class="mt-7 mb-4">
        
        <p class="m-0 text-secondary text-sm">footer
            <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
        </p>
    </footer>
</section>

    <?php
}

?>


