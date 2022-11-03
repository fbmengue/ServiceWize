<?php

use controller\AppointmentContr;

session_start();

if (isset($_POST["appointmentID"])) {
    //Get dados
    $userEmail = $_SESSION["userEmail"];
    $appointmentID = $_POST["appointmentID"];




    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/appointment.classe.php';
    include __DIR__ . '/../../../controller/appointment-contr.classes.php';

    // //New Service
    $newAppointment = new AppointmentContr();

    // //Roda erros
    $newAppointment->cancelAppointmentForClient($userEmail, $appointmentID);


    //volta para a home
    //header("location: ../../../index.php?page=home");

    echo '<div class="alert alert-success">Appointment successfully canceled</div>';
}