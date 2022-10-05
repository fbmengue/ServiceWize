<?php

use controller\AppointmentContr;

session_start();

if (isset($_POST["submit"])) {
    //Get dados
    $clientID = $_POST["selectClientName"];
    $serviceArrayID = explode('|', $_POST['selectServiceName']);
    $serviceArrayDuration = explode('|', $_POST['selectServiceDuration']);
    $serviceArrayPrice = explode('|', $_POST['selectServicePrice']);
    $appointmentDate = $_POST["inputAppointmentDate"];
    $appointmentStartTime = $_POST["inputAppointmentTime"];

    $serviceID = $serviceArrayID[0];
    $serviceDuration = $serviceArrayDuration[1];
    $servicePrice = $serviceArrayPrice[2];

    $appointmentStartDateTime = strtotime($appointmentDate . " " . $appointmentStartTime);
    $appointmentEndDateTime = strtotime($appointmentDate . " " . $serviceDuration);
    $appointmentEndTime = date('H:i', $appointmentStartDateTime + $appointmentEndDateTime);

    $professionalID = $_POST["selectProfessionalName"];

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


    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/appointment.classe.php';
    include __DIR__ . '/../../../controller/appointment-contr.classes.php';

    //New Service
    $newAppointment = new AppointmentContr();

    //Roda erros
    $newAppointment->addAppointment($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);


    //volta para a home
    header("location: ../../../index.php?page=home");
}
