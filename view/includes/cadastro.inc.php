<?php

use controller\CadastroContr;

// print "<pre>";
// print_r($_POST);
// print "</pre>";
if (isset($_POST) || !empty($_POST)) {
    //Get dados
    $nome = $_POST["firstName"];
    $sobrenome = $_POST["lastName"];
    $pw = $_POST["password"];
    $pwRepeat = $_POST["repeatPassword"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];


    //Instancias
    include __DIR__ . '/../../model/db.classes.php';
    include __DIR__ . '/../../model/cadastro.classes.php';
    include __DIR__ . '/../../controller/cadastro-contr.classes.php';
    // include "../../model/db.classes.php";
    // include "../../model/cadastro.classes.php";
    // include "../../controller/cadastro-contr.classes.php";

    // print "<pre>";
    // print_r($nome);
    // print "</pre>";
    // print "<pre>";
    // print_r($sobrenome);
    // print "</pre>";
    // print "<pre>";
    // print_r($pw);
    // print "</pre>";
    // print "<pre>";
    // print_r($pwRepeat);
    // print "</pre>";
    // print "<pre>";
    // print_r($email);
    // print "</pre>";
    // print "<pre>";
    // print_r($tel);
    // print "</pre>";



    //$cadastro = new cadastroContr($userID, $pwd, $pwdRepeat, $email);
    $cadastro = new CadastroContr($nome, $sobrenome, $pw, $pwRepeat, $email, $tel);

    //  print "<pre>";
    // print_r($cadastro);
    // print "</pre>";

    //Roda erros
    $cadastro->cadastroUtilizador();


    // //volta para a home
    header("location: ../../index.php?page=login");
}
