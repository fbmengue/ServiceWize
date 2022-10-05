<?php

use controller\AppointmentContr;

session_start();

if (isset($_POST["submit"])) {
    //Get dados

    $clientArrayID = explode('|', $_POST['selectClientName']);
    $clientArrayName = explode('|', $_POST['selectClientName']);
    $clientArrayEmail = explode('|', $_POST['selectClientEmail']);
    $clientArrayBirthDate = explode('|', $_POST['selectClientBirthDate']);
    $clientArrayMobile = explode('|', $_POST['selectClientMobile']);

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



    // print_r(nl2br("name: " . $fullName . "\r\n"));
    // print_r(nl2br("email: " . $email . "\r\n"));
    // print_r(nl2br("mobile: " . $mobile . "\r\n"));
    // print_r(nl2br("birth: " . $birthDate . "\r\n"));
    //  print_r(nl2br("ClienteID: " . $clientID . "\r\n"));
    // print_r(nl2br("ServiceID: " . $serviceID . "\r\n"));
    // print_r(nl2br("Date: " . $appointmentDate . "\r\n"));
    // print_r(nl2br("Start Time: " . $appointmentStartTime . "\r\n"));
    // print_r(nl2br("Service Duration: " . $serviceDuration . "\r\n"));
    // print_r(nl2br("End Time: "  . date('H:i', $appointmentEndTime) . "\r\n"));
    // print_r(nl2br("ProfessionalID: " . $professionalID . "\r\n"));






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
    header("location: ../../../index.php?page=home");
}
