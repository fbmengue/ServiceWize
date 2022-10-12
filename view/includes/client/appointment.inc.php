<?php

use controller\AppointmentContr;
use controller\ClientContr;
use controller\ServiceContr;

session_start();

if (isset($_POST["submit"])) {
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
    $professionalID = $_POST["selectProfessionalForClient"];

    $serviceArrayID = explode('|', $_POST['selectServiceName-' . $professionalID]);
    $serviceID = $serviceArrayID[0];

    $clientDataList = $newClientData->getClientDataListByUserEmail($_SESSION["userEmail"]);
    $clientID = $clientDataList[0]['clientID'];

    $serviceDataList = $newServiceData->getServiceDataListByID($serviceID);
    $serviceDuration = $serviceDataList[0]['serviceTime'];
    $servicePrice = $serviceDataList[0]['servicePrice'];

    $appointmentDate = $_POST["inputAppointmentDate"];
    $appointmentStartTime = $_POST["inputAppointmentTime"];


    $appointmentStartDateTime = strtotime($appointmentDate . " " . $appointmentStartTime);
    $appointmentEndDateTime = strtotime($appointmentDate . " " . $serviceDuration);
    $appointmentEndTime = date('H:i', $appointmentStartDateTime + $appointmentEndDateTime);










    //Roda erros
    if (is_numeric($clientID)) {
        $newAppointment->addAppointment($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
    } else {
        $fullName = $_SESSION["userFullName"];
        $email = $_SESSION["userEmail"];
        $birthDate = $_SESSION["userBirthDate"];
        $mobile = $_SESSION["userMobile"];
        $newAppointment->addClientAndAppointmentForClient($fullName, $birthDate, $email, $mobile, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
    }






    //volta para a home
    header("location: ../../../index.php?page=home");
}
