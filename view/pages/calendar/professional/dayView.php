<?php

use controller\AppointmentContr;

session_start();
//HEADER / NAVBAR
include __DIR__ . '/../../../widgets/navbar.php';

$hoje = date('Y-m-d', time());


if (isset($_GET["date"])) {
    //Get dados
    $calendarDate = $_GET["date"];



    //Instancias
    include __DIR__ . '/../../../../model/db.classes.php';
    include __DIR__ . '/../../../../model/appointment.classe.php';
    include __DIR__ . '/../../../../controller/appointment-contr.classes.php';

    //New appointment list by date
    $newAppointmentList = new AppointmentContr();

    //Roda erros
    $appointmentDayList = $newAppointmentList->getMyAppointmentListByDate($calendarDate, $_SESSION["userEmail"]);






    ?>
<section class="d-flex flex-column align-items-center pt-0 pb-8 bg-default main-content">


    <!-- ADD CALENDAR WIDGET -->
    <div id="dayViewHeader" class="d-flex flex-column w-100 align-items-center bg-white /*bg-box-shadow-calendar*/"
        style="max-width: 1070px">
        <?php
            include __DIR__ . '/../../../widgets/professional/calendarWidget-dayView.php';
        ?>
    </div>

    <div class="container" id="dayViewContent" style="max-width: 1070px;">
        <div class="row">
            <div class="col-sm-12 pe-2 ps-2">
                <?php
                if ($appointmentDayList) {
                    foreach ($appointmentDayList as $dayItem) {
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
                            <div class="d-flex align-items-center dropstart">
                                <div class="appointment-dot-click" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="appointment-dot-actions"> </div>
                                </div>
                                <?php if ($calendarDate >= $hoje) { ?>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item"
                                            id="edit-button-<?php echo $dayItem['appointmentID'] . "-" . $dayItem['appointmentDate']; ?>"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditAppointment"
                                            aria-controls="offcanvasEditAppointment"
                                            onclick="loadAppointmentEditForProfessional(this); return false;">Edit</button>
                                    </li>
                                    <li><button class="dropdown-item"
                                            id="cancel-button-<?php echo $dayItem['appointmentID']; ?>"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCancelAppointment"
                                            aria-controls="offcanvasCancelAppointment"
                                            onclick="loadAppointmentCancelForProfessional(this); return false;">Cancel</button>
                                    </li>
                                    <li><button class="dropdown-item">Coming Soon</button></li>
                                </ul>
                                <?php } ?>

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


                <?php }
                } else { ?>
                <div class="appointment-dayview col-sm-12 bg-widget mt-3 p-3 rounded-3 /*bg-box-shadow-thin*/">
                    <div class="row">
                        <div style="text-align: center;" class="appointment-dayview-service col-sm-12">
                            <h5><?php echo 'No Appointment Schedule'; ?></h5>
                        </div>
                    </div>
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
</section><?php
} else {
    //Get dados
    $_GET["date"] = date('Y-m-d', time());
    $calendarDate = $_GET["date"];


    //Instancias
    include __DIR__ . '/../../../../model/db.classes.php';
    include __DIR__ . '/../../../../model/appointment.classe.php';
    include __DIR__ . '/../../../../controller/appointment-contr.classes.php';

    //New appointment list by date
    $newAppointmentList = new AppointmentContr();

    //Roda erros
    $appointmentDayList = $newAppointmentList->getMyAppointmentListByDate($calendarDate, $_SESSION["userEmail"]);







    ?>
<section class="d-flex flex-column align-items-center pt-0 pb-8 bg-default main-content">


    <!-- ADD CALENDAR WIDGET -->
    <div id="dayViewHeader" class="d-flex flex-column w-100 align-items-center bg-white" style="max-width: 1070px">
        <?php
            include __DIR__ . '/../../../widgets/professional/calendarWidget-dayView.php';
        ?>
    </div>

    <div class="container" id="dayViewContent" style="max-width: 1070px;">
        <div class="row">
            <div class="col-sm-12 pe-2 ps-2">

                <?php
                if ($appointmentDayList) {
                    foreach ($appointmentDayList as $dayItem) {
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
                            <div class="d-flex align-items-center dropstart">
                                <div class="appointment-dot-click" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="appointment-dot-actions"> </div>
                                </div>
                                <?php if ($calendarDate >= $hoje) { ?>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item"
                                            id="edit-button-<?php echo $dayItem['appointmentID'] . "-" . $dayItem['appointmentDate']; ?>"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditAppointment"
                                            aria-controls="offcanvasEditAppointment"
                                            onclick="loadAppointmentEditForProfessional(this); return false;">Edit</button>
                                    </li>
                                    <li><button class="dropdown-item"
                                            id="cancel-button-<?php echo $dayItem['appointmentID']; ?>"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCancelAppointment"
                                            aria-controls="offcanvasCancelAppointment"
                                            onclick="loadAppointmentCancelForProfessional(this); return false;">Cancel</button>
                                    </li>
                                    <li><button class="dropdown-item">Coming Soon</button></li>
                                </ul>
                                <?php } ?>

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


                <?php }
                } else {?>
                <div class="appointment-dayview col-sm-12 bg-widget mt-3 p-3 rounded-3 /*bg-box-shadow-thin*/">
                    <div class="row">
                        <div style="text-align: center;" class="appointment-dayview-service col-sm-12">
                            <h5><?php echo 'No Appointment Schedule'; ?></h5>
                        </div>
                    </div>
                </div>

                <?php
                } ?>



            </div>
        </div>
    </div>





    <footer class="mt-7 mb-4">

        <p class="m-0 text-secondary text-sm">footer
            <a class="text-1DB968 fw-semibold" href="?page=login">pensar em footer</a>
        </p>
    </footer>
</section>

<?php
}

?>
<div id="offCanvasDiv">
    <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasCancelAppointment"
        aria-labelledby="offcanvasCancelLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasCancelLabel">Cancel Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="offcanvas-body-cancel">
            <form class="row g-3" id="form-professional-cancel-appointment" method="POST">
                <span id="messageCancel"></span>
                <p>Are you sure you want to cancel your Appointment?</p>

                <div class="col-12">
                    <button id="appointmentButtonForClientCancel"
                        onclick="cancelAppointmentForProfessional(this); return false;" class="btn btn-primary">Yes
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="offcanvas"
                        aria-label="Close">No</button>
                </div>
            </form>
        </div>
    </div>

    <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasEditAppointment"
        aria-labelledby="offcanvasEditLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasEditLabel">Edit My Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="offcanvas-body-edit">
            <span id="messageProfessionalAppEdit"></span>
            <form class="row g-3" id="form-professional-edit-appointment" method="POST">

            </form>
        </div>
    </div>
</div>