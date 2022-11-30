<?php

//New appointment list by date

use controller\AdminContr;

if (isset($_POST["adminSetupSelect"])) {
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/admin.classe.php';
    include __DIR__ . '/../../../controller/admin-contr.classes.php';

    $admin = new AdminContr();

    $adminSetupSelect = $_POST["adminSetupSelect"];



    if ($adminSetupSelect === 'professionals') {
        $professionalID = $_POST["professionalID"];
        $professionalFullName = $_POST["professionalFullName"];
        $professionalEmail = $_POST["professionalEmail"];
        $admin->setAdminSetupDataProfessional($professionalID, $professionalFullName, $professionalEmail);

        $dataChanged = 'Professional';
    }

    if ($adminSetupSelect === 'clients') {
        $clientID = $_POST["clientID"];
        $clientFullName = $_POST["clientFullName"];
        $clientEmail = $_POST["clientEmail"];
        $clientBirthDateList = explode('-', $_POST["clientBirthDate"]);
        $clientBirthDate = $clientBirthDateList[2] . '-' . $clientBirthDateList[1] . '-' . $clientBirthDateList[0];
        $clientMobile = $_POST["clientMobile"];

        $admin->setAdminSetupDataClient($clientID, $clientFullName, $clientEmail, $clientBirthDate, $clientMobile);

        $dataChanged = 'Client';
    }
    if ($adminSetupSelect === 'services') {
        $serviceID = $_POST["serviceID"];
        $serviceName = $_POST["serviceName"];
        $serviceDuration = $_POST["serviceTime"];
        $servicePrice = $_POST["servicePrice"];
        $professionalID = $_POST["professionalID"];
        $professionalEmail = $_POST["professionalEmail"];
        $admin->setAdminSetupDataService($serviceID, $serviceName, $serviceDuration, $servicePrice, $professionalID, $professionalEmail);

        $dataChanged = 'Service';
    }
    if ($adminSetupSelect === 'appointments') {
        $appID = $_POST["appID"];
        $appDateList = explode('-', $_POST["appDate"]);
        $appDate = $appDateList[2] . '-' . $appDateList[1] . '-' . $appDateList[0];
        $appStartTime = $_POST["appStartTime"];
        $appEndTime = $_POST["appEndTime"];
        $appCanceled = $_POST["appCanceled"];



        $clientID = $_POST["clientID"];
        $clientFullName = $_POST["clientFullName"];
        $clientEmail = $_POST["clientEmail"];

        $professionalID = $_POST["professionalID"];
        $professionalFullName = $_POST["professionalFullName"];
        $professionalEmail = $_POST["professionalEmail"];

        $serviceID = $_POST["serviceID"];
        $serviceName = $_POST["serviceName"];
        $serviceDuration = $_POST["serviceDuration"];
        $servicePrice = $_POST["servicePrice"];

        $admin->setAdminSetupDataAppointment(
            $appID,
            $appDate,
            $appStartTime,
            $appEndTime,
            $appCanceled,
            $clientID,
            $clientFullName,
            $clientEmail,
            $clientBirthDate,
            $clientMobile,
            $professionalID,
            $professionalFullName,
            $professionalEmail,
            $serviceID,
            $serviceName,
            $serviceDuration,
            $servicePrice
        );
        $dataChanged = 'Appointment';
    }
    if ($adminSetupSelect === 'appointmentFilter') {
        $dataChanged = 'appointmentFilter';
    }
  //Roda erros
    echo '<div class="alert alert-success" style="width: 350px;">' . $dataChanged . ' Change Saved</div>';
}