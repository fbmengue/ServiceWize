<?php

use controller\ProfessionalContr;

session_start();

if (isset($_POST["inputProfessionalEmail"])) {
    //Get dados
    $fullName = $_POST["inputProfessionalFullName"];
    $email = $_POST["inputProfessionalEmail"];





    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/professional.classe.php';
    include __DIR__ . '/../../../controller/professional-contr.classes.php';



    //New Professional
    $newProfessional = new ProfessionalContr();

    //Roda erros
    $newProfessional->addProfessional($fullName, $email);


    echo '<div class="alert alert-success">Professional Saved</div>';
}