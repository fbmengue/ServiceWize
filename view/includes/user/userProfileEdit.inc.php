<?php

use controller\UserContr;

session_start();

if (isset($_SESSION["userID"])) {
    //Get dados
    $userID = $_SESSION["userID"];
    $fullName = $_POST["inputUserFullName"];
    $email = $_POST["inputUserEmail"];
    $mobile = $_POST["inputUserMobile"];
    $birthDate = $_POST["inputUserBirthDate"];





    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/user.classe.php';
    include __DIR__ . '/../../../controller/user-contr.classes.php';



    //New Professional
    $newUser = new UserContr();

    //Roda erros
    $newUser->setMyUserProfileByID($userID, $fullName, $email, $mobile, $birthDate);


    //volta para a home
    //header("location: ../../../index.php?page=user/account");

    echo '<div class="alert alert-success">Profile Updated</div>';
}