<?php

use controller\AppointmentContr;
use controller\ProfessionalContr;

session_start();

$hoje = date('Y-m-d', time());





    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    //include __DIR__ . '/../../../model/appointment.classe.php';
   //include __DIR__ . '/../../../controller/appointment-contr.classes.php';

    // New appointment list by date
    $allTodayAppointmentList = new AppointmentContr();

    // Roda erros
     $todayList = $allTodayAppointmentList->getAppointmentListByDate($hoje);


    //$dateFormatForView = date("d-m-Y", $time);

if (!empty($todayList)) {
    ?>



<div class="row">
    <div class="col-sm-12 pe-2 ps-2">
        <?php foreach ($todayList as $item) {
                        $startTime = substr($item['appointmentStartTime'], 0, -3);
                        $endTime = substr($item['appointmentEndTime'], 0, -3);
            ?>
        <div class="appointment-dayview col-sm-12 bg-widget mt-3 p-3 rounded-3 /*bg-box-shadow-thin*/">
            <div class="appointment-date row">
                <?php echo date("d F", strtotime($item['appointmentDate'])); ?>
            </div>
            <div class="appointment-content row">
                <div class="appointment-dayview-header col-sm-12 d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="appointment-circle-future">
                        </div>
                        <div>
                            <?php echo $startTime . " - " . $endTime ?>
                        </div>
                    </div>
                    <div class="d-flex align-items-center dropstart">
                        <div class="appointment-dot-click" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="appointment-dot-actions"> </div>
                        </div>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item"
                                    id="edit-button-<?php echo $item['appointmentID'] . "-" . $item['appointmentDate']; ?>"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditAppointment"
                                    aria-controls="offcanvasEditAppointment"
                                    onclick="loadAppointmentEditForAdmin(this); return false;">Edit</button>
                            </li>
                            <li><button class="dropdown-item" id="cancel-button-<?php echo $item['appointmentID']; ?>"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasCancelAppointment"
                                    aria-controls="offcanvasCancelAppointment"
                                    onclick="loadAppointmentCancelForAdmin(this); return false;">Cancel</button>
                            </li>
                            <li><button class="dropdown-item">Coming Soon</button></li>
                        </ul>


                    </div>





                </div>
                <div class="appointment-dayview-service col-sm-12">
                    <h5><?php echo $item['serviceName']; ?></h5>
                </div>
                <div class="appointment-dayview-client d-flex justify-content-between col-sm-12">
                    <div><?php echo $item['clientFullName']; ?></div>
                    <div>Professional: <?php echo $item['professionalFullName']; ?></div>
                </div>
            </div>

        </div>


        <?php } ?>



    </div>
</div>


<?php
} else {
    echo "No Appointments";
}

?>