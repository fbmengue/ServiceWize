<?php

 // add the pagenames In session login
$allowedLogin = array('index','home');
// add the pagenames
$allowedLogout = array('register', 'login', 'index', 'forgotPassword');
session_start();

switch (!isset($_SESSION["userID"])) {
    case '0':
        $page = ( isset($_GET['page']) ) ? $_GET['page'] : 'home'; // IF PAGE EMPTY SET TO LOGIN


        if (in_array($page, $allowedLogin)) {
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
           //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        } else {
            $page = 'home';
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
            //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        }
        break;
        break;

    default:
        $page = ( isset($_GET['page']) ) ? $_GET['page'] : 'login'; // IF PAGE EMPTY SET TO LOGIN
        if (in_array($page, $allowedLogout)) {
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
            //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        } else {
            $page = 'login';
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
            //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        }
        break;
}









//require __DIR__ . '/vendor/autoload.php';
