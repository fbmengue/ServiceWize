<?php

 // add the pagenames In session login
$allowedLogin = array('index','home','calendar/dayView');
 // add the pagenames In session login
 $allowedLoginProfessional = array('index','professional/home','calendar/dayView');
  // add the pagenames In session login
$allowedLoginClient = array('index','client/homec','calendar/dayView');
// add the pagenames
$allowedLogout = array('register', 'login', 'index', 'forgotPassword');
session_start();

switch ($_SESSION["userType"]) {
    case 'admin':
        $page = ( isset($_GET['page']) ) ? $_GET['page'] : 'home'; // IF PAGE EMPTY SET TO HOME


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
    case 'professional':
            $page = ( isset($_GET['page']) ) ? $_GET['page'] : 'professional/home'; // IF PAGE EMPTY SET TO HOME


        if (in_array($page, $allowedLoginProfessional)) {
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
           //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        } else {
            $page = 'professional/home';
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
            //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        }
        break;
    case 'client':
        $page = ( isset($_GET['page']) ) ? $_GET['page'] : 'client/homec'; // IF PAGE EMPTY SET TO HOME


        if (in_array($page, $allowedLoginClient)) {
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
           //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        } else {
            $page = 'client/homec';
            //HEADER
            include __DIR__ . '/view/pages/header.php';
            //PAGE BODY
            include __DIR__ . '/view/pages/' . $page . '.php';
            //FOOTER
            include __DIR__ . '/view/pages/footer.php';
        }
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
