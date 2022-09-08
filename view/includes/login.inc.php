<?php

use controller\LoginContr;

if (isset($_POST) || !empty($_POST)) {
    //Get dados
    $email = $_POST["email"];
    $pwd = $_POST["password"];



    //Instancias
    include __DIR__ . '/../../model/db.classes.php';
    include __DIR__ . '/../../model/login.classes.php';
    include __DIR__ . '/../../controller/login-contr.classes.php';
    // include "../classes/db.classes.php";
    // include "../classes/login.classes.php";
    // include "../classes/login-contr.classes.php";

    //$login = new loginContr($userID, $pwd, $pwdRepeat, $email);
    $login = new LoginContr($email, $pwd);

    //Roda erros
    $login->loginUtilizador();


    // print "<pre>";
    // print_r($email);
    // print "</pre>";
    // print "<pre>";
    // print_r($pwd);
    // print "</pre>";


    // if (!empty($teste)) {
    //     include('../marcaConsultoria.php');
    //     echo $teste;
    // }
    //volta para a home do login
    header("location: ../../index.php?page=home");
}
