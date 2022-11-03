<?php

use controller\ClientContr;

session_start();

if (isset($_POST["inputClientEmail"])) {
    //Get dados
    $fullName = $_POST["inputClientFullName"];
    $email = $_POST["inputClientEmail"];
    $mobile = $_POST["inputClientMobile"];
    $birthDate = $_POST["inputClientDateBirth"];




    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/client.classe.php';
    include __DIR__ . '/../../../controller/client-contr.classes.php';

    //New Service
    $newClient = new ClientContr();

    //Roda erros
    $newClient->addClient($fullName, $birthDate, $email, $mobile);


    //volta para a home
    echo '<div class="alert alert-success">Client Saved</div>';
}