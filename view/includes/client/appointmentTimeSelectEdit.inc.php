<?php

use controller\AppointmentContr;
use controller\ClientContr;
use controller\ServiceContr;

session_start();

if (isset($_POST["selectProfessionalForClientEdit"])) {
    //Instancias Appointment
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/appointment.classe.php';
    include __DIR__ . '/../../../controller/appointment-contr.classes.php';

    include __DIR__ . '/../../../model/client.classe.php';
    include __DIR__ . '/../../../controller/client-contr.classes.php';

    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newAppointment = new AppointmentContr();
    $newClientData = new ClientContr();
    $newServiceData = new ServiceContr();

    //Get dados
    $professionalID = $_POST["selectProfessionalForClientEdit"];



    $serviceArrayID = explode('|', $_POST['selectServiceNameForClientEdit']);
    $serviceID = $serviceArrayID[0];

    $clientDataList = $newClientData->getClientDataListByUserEmail($_SESSION["userEmail"]);
    $clientID = $clientDataList[0]['clientID'];

    $serviceDataList = $newServiceData->getServiceDataListByID($serviceID);
    $serviceDuration = $serviceDataList[0]['serviceTime'];
    $servicePrice = $serviceDataList[0]['servicePrice'];

    $appointmentDate = $_POST["inputAppointmentDateEdit"];



    // print_r(nl2br("ClienteID: " . $clientID . "\r\n"));
    // print_r(nl2br("ServiceID: " . $serviceID . "\r\n"));
    // print_r(nl2br("Date: " . $appointmentDate . "\r\n"));
    // print_r(nl2br("Start Time: " . $appointmentStartTime . "\r\n"));
    // print_r(nl2br("Service Duration: " . $serviceDuration . "\r\n"));
    // print_r(nl2br("End Time: "  . date('H:i', $appointmentEndTime) . "\r\n"));
    // print_r(nl2br("ProfessionalID: " . $professionalID . "\r\n"));
    // print_r(nl2br("Duration: " . $serviceDuration . "\r\n"));
    // print_r(nl2br("Price: " . $servicePrice . "\r\n"));
    // exit;

    // print_r($appointmentDate);
    // exit;
    //Roda erros
    $timeList = $newAppointment->getTimeAvailableByProfessionalDateService($professionalID, $serviceID, $appointmentDate);



    //volta para a home
    //header("location: ../../../index.php?page=home");
    $timeAvailableArray = [
        "09:00",
        "09:30",
        "10:00",
        "10:30",
        "11:00",
        "11:30",
        "12:00",
        "12:30",
        "13:00",
        "13:30",
        "14:00",
        "14:30",
        "15:00",
        "15:30",
        "16:00",
        "16:30",
        "17:00",
        "17:30",
        "18:00",
        "18:30",
        "19:00",
        "19:30",

    ];

    foreach ($timeList as $item) {
        $start = substr($item['appointmentStartTime'], 0, -3);
        $timeNotAvailable[] = $start;
        //$arrayTeste[] = $end;

        $one = strtotime($item['appointmentStartTime']);
        $two = strtotime($item['appointmentEndTime']);

        while ($two > $one) {
            $interval_timestamp = $one += 60 * 30;
            $timeNotAvailable[] = date('H:i', $interval_timestamp);//output as needed.
        }
    }
    // print_r("<pre>");
    // print_r($arrayTeste);
    // print_r("</pre>");
    // print_r("<pre>");
    // print_r($timeAvailableArray);
    // print_r("</pre>");
    // print_r("<pre>");
    // print_r($horasADD);
    // print_r("</pre>");


    if (!empty($timeList)) {
        ?>
<label for="inputAppointmentTimeEdit" class="form-label">Time</label>
<select class="form-select form_data_edit" id="inputAppointmentTimeEdit" name="inputAppointmentTimeEdit"
    aria-label="Default select example">
    <option value=""></option>

    <?php

        foreach ($timeAvailableArray as $AllTimes) {
            if (!in_array($AllTimes, $timeNotAvailable)) {
                ?>
    <option value="<?php echo $AllTimes ?>"><?php echo $AllTimes ?></option>



    <?php
            }
        }

        ?>

</select>

<?php
    } else {
        ?>
<label for="inputAppointmentTimeEdit" class="form-label">Time</label>
<select class="form-select form_data_edit" id="inputAppointmentTimeEdit" name="inputAppointmentTimeEdit"
    aria-label="Default select example">
    <option value=""></option>
    <?php

        foreach ($timeAvailableArray as $AllTimes) {
            ?>
    <option value="<?php echo $AllTimes ?>"><?php echo $AllTimes ?></option>



    <?php
        }

        ?>






</select>

<?php
    }
} else {
    echo "Error";
}