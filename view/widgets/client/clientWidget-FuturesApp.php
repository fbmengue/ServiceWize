<?php

use controller\ClientContr;

session_start();

$hoje = date('Y-m-d', time());





    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    //include __DIR__ . '/../../../model/client.classe.php';
  // include __DIR__ . '/../../../controller/client-contr.classes.php';

    // New appointment list by date
    $myAppointmentList = new ClientContr();

    // Roda erros
     $myClientAppointmentList = $myAppointmentList->getMyClientFutureAppointmentByEmail($_SESSION["userEmail"], $hoje);

    // print_r("<pre>");
    // print_r($myClientAppointmentList);
    // print_r("</pre>");

    //$dateFormatForView = date("d-m-Y", $time);

if (!empty($myClientAppointmentList)) {
    ?>


  
        <div class="row">
            <div class="col-sm-12 pe-2 ps-2">
            <?php foreach ($myClientAppointmentList as $item) {
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
                                <div
                                    class="appointment-circle-future">
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
                            <h5><?php echo $item['serviceName']; ?></h5>
                        </div>
                        <div class="appointment-dayview-client col-sm-12">
                            <div><?php echo $item['professionalFullName']; ?></div>
                        </div>
                    </div>

                </div>


            <?php } ?>



            </div>
        </div>
 

    <?php
} else {
    echo "Sem marcações";
}

?>


