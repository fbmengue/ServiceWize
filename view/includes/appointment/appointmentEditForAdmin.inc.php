<?php

use controller\AppointmentContr;
use controller\ClientContr;
use controller\ProfessionalContr;
use controller\ServiceContr;

session_start();

if (isset($_POST["appointmentID"])) {
    //Get dados
    $professionalEmail = $_SESSION["userEmail"];
    $appointmentID = $_POST["appointmentID"];



    //Instancias Appointment
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/appointment.classe.php';
    include __DIR__ . '/../../../controller/appointment-contr.classes.php';

    include __DIR__ . '/../../../model/client.classe.php';
    include __DIR__ . '/../../../controller/client-contr.classes.php';

    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    include __DIR__ . '/../../../model/professional.classe.php';
    include __DIR__ . '/../../../controller/professional-contr.classes.php';



    //New Service
    $newAppointment = new AppointmentContr();
    $newClientData = new ClientContr();
    $newServiceData = new ServiceContr();
    $newProfessionalData = new ProfessionalContr();


    //Get dados

    $serviceArrayID = explode('|', $_POST['selectServiceNameForAdminEdit']);
    $serviceID = $serviceArrayID[0];



    $clientArrayID = explode('|', $_POST['selectClientNameEdit']);
    $clientID = $clientArrayID[0];








    $serviceDataList = $newServiceData->getServiceDataListByID($serviceID);
    $serviceDuration = $serviceDataList[0]['serviceTime'];
    $servicePrice = $serviceDataList[0]['servicePrice'];



    $appointmentDate = $_POST["inputAppointmentDateEdit"];
    $appointmentStartTime = $_POST["inputAppointmentTimeEdit"];



    $appointmentStartDateTime = strtotime($appointmentDate . " " . $appointmentStartTime);
    $appointmentEndDateTime = strtotime($appointmentDate . " " . $serviceDuration);
    $appointmentEndTime = date('H:i', $appointmentStartDateTime + $appointmentEndDateTime);





    $professionalID = $_POST["inputProfessionalAppEdit"];






    $newAppointment->editAdminAppointmentByID($appointmentID, $clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);








    // //New Service
    //$newAppointment = new AppointmentContr();

    // //Roda erros
   // $newAppointment->cancelAppointmentForClient($userEmail, $appointmentID);


    //volta para a home
    //header("location: ../../../index.php?page=home");

    echo '<div class="alert alert-success">Appointment successfully updated</div>';
}