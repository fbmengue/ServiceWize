<?php

use controller\AppointmentContr;

session_start();

if (isset($_SESSION["userEmail"])) {
    //Get dados

    $clientArrayID = explode('|', $_POST['selectClientName']);
    $clientArrayName = explode('|', $_POST['selectClientName']);
    $clientArrayEmail = explode('|', $_POST['selectClientEmail']);
    $clientArrayBirthDate = explode('|', $_POST['selectClientBirthDate']);
    $clientArrayMobile = explode('|', $_POST['selectClientMobile']);

    $serviceArrayID = explode('|', $_POST['selectServiceName']);
    $serviceArrayDuration = explode('|', $_POST['selectServiceDuration']);
    $serviceArrayPrice = explode('|', $_POST['selectServicePrice']);

    $appointmentDate = $_POST["inputAppointmentDateProfessionalAdd"];
    $appointmentStartTime = $_POST["inputAppointmentTimeProfessionalAdd"];

    $serviceID = $serviceArrayID[0];
    $serviceDuration = $serviceArrayID[1];
    $servicePrice = $serviceArrayID[2];

    $appointmentStartDateTime = strtotime($appointmentDate . " " . $appointmentStartTime);
    $appointmentEndDateTime = strtotime($appointmentDate . " " . $serviceDuration);
    $appointmentEndTime = date('H:i', $appointmentStartDateTime + $appointmentEndDateTime);




    //Instancias Appointment
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/appointment.classe.php';
    include __DIR__ . '/../../../controller/appointment-contr.classes.php';

     //New Service
     $newAppointment = new AppointmentContr();



    if (empty($_POST["selectProfessionalName"])) {
        $professionalID = $newAppointment->getProfessionalIDByEmail($_SESSION["userEmail"]);
    } else {
        $professionalID = $_POST["selectProfessionalName"];
    }




    //Get dados
    $clientID = $clientArrayID[0];

    if (is_numeric($clientID)) {
        $fullName = $clientArrayName[1];
        $email = $clientArrayEmail[2];
        $birthDate = $clientArrayBirthDate[3];
        $mobile = $clientArrayMobile[4];
    } else {
        $fullName = $clientArrayName[0];
        $email = $clientArrayEmail[0];
        $birthDate = $clientArrayBirthDate[0];
        $mobile = $clientArrayMobile[0];
    }











    //Instancias Client
    //include __DIR__ . '/../../../model/client.classe.php';
   // include __DIR__ . '/../../../controller/client-contr.classes.php';

    //New Service
    //$newClientAppointment = new ClientContr();

    //Roda erros
    //$newClient->addClient($fullName, $birthDate, $email, $mobile);

    //$lastClient = $newClient->getClientID($fullName, $birthDate, $email, $mobile);

    //print_r(nl2br("LASTCLIent: " . $lastClient . "\r\n"));








    //Roda erros
    if (is_numeric($clientID)) {
        $newAppointment->addAppointment($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
    } else {
        $newAppointment->addClientAndAppointment($fullName, $birthDate, $email, $mobile, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
    }






    //volta para a home
    //header("location: ../../../index.php?page=home");
    echo '<div class="alert alert-success">Appointment Saved</div>';
}