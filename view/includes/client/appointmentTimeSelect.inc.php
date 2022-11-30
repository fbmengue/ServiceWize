<?php

use controller\AppointmentContr;
use controller\ClientContr;
use controller\ServiceContr;

session_start();

if (isset($_POST["selectProfessionalForClientAdd"])) {
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
    $professionalID = $_POST["selectProfessionalForClientAdd"];

    $serviceArrayID = explode('|', $_POST['selectServiceNameForClientAdd']);
    $serviceID = $serviceArrayID[0];

    $clientDataList = $newClientData->getClientDataListByUserEmail($_SESSION["userEmail"]);
    $clientID = $clientDataList[0]['clientID'];

    $serviceDataList = $newServiceData->getServiceDataListByID($serviceID);
    $serviceDuration = $serviceDataList[0]['serviceTime'];
    $servicePrice = $serviceDataList[0]['servicePrice'];

    $appointmentDate = $_POST["inputAppointmentDate"];



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


    //Roda erros
    $timeList = $newAppointment->getTimeAvailableByProfessionalDateService($professionalID, $serviceID, $appointmentDate);


    function prefix_get_next_key_array($arr, $key)
    {
        $keys     = array_keys($arr);
        $position = array_search($key, $keys, true);
        if (array_key_exists($key, $arr)) {
            if (isset($keys[ $position + 1 ])) {
                $next_key = $keys[ $position + 1 ];
            }
        }

        return $next_key;
    }


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
        //$arrayAvailableFinal[] = $end;

        $one = strtotime($item['appointmentStartTime']);
        $two = strtotime($item['appointmentEndTime']);

        while ($two > $one) {
            $interval_timestamp = $one += 60 * 30;
            $timeNotAvailable[] = date('H:i', $interval_timestamp);//output as needed.
        }
    }

    $serviceDurationBegin = '00:00';
    $serviceDurationBeginTimeStamp = strtotime($serviceDurationBegin);
    $serviceDurationTimeStamp = strtotime($serviceDuration);

    while ($serviceDurationTimeStamp > $serviceDurationBeginTimeStamp) {
        $interval_timestamp = $serviceDurationBeginTimeStamp += 60 * 30;
        $timeDurationAvailable[] = date('H:i', $interval_timestamp);//output as needed.
    }
    if (!empty($timeNotAvailable)) {
        $arrayAvailableFinal = array_diff($timeAvailableArray, $timeNotAvailable);
    } else {
        $arrayAvailableFinal = $timeAvailableArray;
    }

    if (!empty($arrayAvailableFinal)) {
        foreach ($arrayAvailableFinal as $key => $item) {
            $currentElement = $item;
            $nextElement = next($arrayAvailableFinal);

            $durationSlots = count($timeDurationAvailable);

            $startSlots = 0;
            unset($arrayTemp);
            $arrayTemp[] = [];

            while ($startSlots < $durationSlots) {
                $nextKey = key($arrayAvailableFinal);

                $nextKeyFunction = prefix_get_next_key_array($arrayAvailableFinal, $key + $startSlots);


                if (($key + $startSlots + 1) === $nextKeyFunction) {
                    $arrayTemp[] = $key . " " . $startSlots . " " . $nextKeyFunction ;
                    $timeNotAvailableTESTE3[] = $currentElement;
                }

                $timeNotAvailableTESTE[] = $key   . " " . $startSlots . " " . $nextKeyFunction . " " . $currentElement;
                $nextElement = next($arrayAvailableFinal);


                $startSlots += 1;
            }
            $teste[] = count($arrayTemp) - 1 . " " . $durationSlots;
            if ((!empty($arrayTemp)) && count($arrayTemp) - 1 == $durationSlots) {
                $arrayAvailableAppService[] = $currentElement;
            }
        }
    } else {
        $arrayAvailableAppService[] = "No time Available";
    }










    if (!empty($timeList)) {
        ?>
<label for="inputAppointmentTime" class="form-label">Time</label>
<select class="form-select form_data" id="inputAppointmentTime" name="inputAppointmentTime"
    aria-label="Default select example">
    <option value=""></option>

    <?php
        if (empty($arrayAvailableAppService)) {
            ?>

    <option value="">No time Available</option>



    <?php
        } else {
            foreach ($arrayAvailableAppService as $AllTimes) {
                ?>

    <option value=" <?php echo $AllTimes ?>"><?php echo $AllTimes; ?></option>



    <?php
            }
        }
        ?>

</select>

<?php
    } else {
        ?>
<label for="inputAppointmentTime" class="form-label">Time</label>
<select class="form-select form_data" id="inputAppointmentTime" name="inputAppointmentTime"
    aria-label="Default select example">
    <option value=""></option>
    <?php

        foreach ($arrayAvailableAppService as $AllTimes) {
            ?>
    <option value="<?php echo $AllTimes ?>"><?php echo $AllTimes ?></option>



    <?php
        }

        ?>

</select>

<?php
    }
} else {
    echo "No time Available";
}