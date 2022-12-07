<?php

use controller\UserContr;

session_start();

if (isset($_SESSION["userID"])) {
    //Get dados
    $userID = $_SESSION["userID"];
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $newPasswordRepeat = $_POST["newPasswordRepeat"];





    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/user.classe.php';
    include __DIR__ . '/../../../controller/user-contr.classes.php';



    //New Professional
    $newUser = new UserContr();



    //Roda erros
    $newUser->setMyUserPasswordByID($userID, $currentPassword, $newPassword, $newPasswordRepeat);



    //volta para a home
    //header("location: ../../../index.php?page=user/account");

    echo '<div class="alert alert-success">Password Updated</div>';
}