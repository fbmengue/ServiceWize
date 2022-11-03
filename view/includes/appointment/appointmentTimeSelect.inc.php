<?php

use controller\AppointmentContr;
use controller\ClientContr;
use controller\ServiceContr;

session_start();

if (isset($_POST["addSelectProfessionalForClient"])) {
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
    $professionalID = $_POST["addSelectProfessionalForClient"];

    $serviceArrayID = explode('|', $_POST['addSelectServiceName-' . $professionalID]);
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
    $newAppointment->getTimeAvailableByProfessionalDateService($professionalID, $serviceID, $appointmentDate);

    $success = '<div class="alert alert-success">Data Saved</div>';

    //volta para a home
    //header("location: ../../../index.php?page=home");

    $success = '';


    $name_error = '';
    $email_error = '';
    $website_error = '';
    $comment_error = '';
    $gender_error = '';


    $output = array(
        'success'       =>  $success,
        'name_error'    =>  $name_error,
        'email_error'   =>  $email_error,
        'website_error' =>  $website_error,
        'comment_error' =>  $comment_error,
        'gender_error'  =>  $gender_error
    );
    print_r("teste");
    exit;

    echo json_encode($output);
}