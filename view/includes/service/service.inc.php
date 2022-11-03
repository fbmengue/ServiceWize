<?php

use controller\ServiceContr;

session_start();

if (isset($_POST["inputServiceName"])) {
    //Get dados
    $name = $_POST["inputServiceName"];
    $duration = $_POST["inputServiceDuration"];
    $price = $_POST["inputServicePrice"];





    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newService = new ServiceContr();

    //Roda erros
    if (!empty($_POST["inputServiceProfessional"])) {
        $professionalID = $_POST["inputServiceProfessional"];
        $newService->addService($name, $duration, $price, $professionalID);
    } else {
        $userEmail = $_SESSION["userEmail"];
        $newService->addMyServiceProfessional($name, $duration, $price, $userEmail);
    }





    //volta para a home
    echo '<div class="alert alert-success">Service Saved</div>';
}