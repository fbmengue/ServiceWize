<?php

if ($_POST["adminSetupSelect"]) {
    switch ($_POST["adminSetupSelect"]) {
        case 'professionals':
            include __DIR__ . '/adminSetupSelectProf.inc.php';
            break;

        case 'clients':
            include __DIR__ . '/adminSetupSelectClients.inc.php';
            break;

        case 'services':
            include __DIR__ . '/adminSetupSelectServices.inc.php';
            break;

        case 'appointments':
            include __DIR__ . '/adminSetupSelectApp.inc.php';
            break;

        case 'appointmentFilter':
            include __DIR__ . '/adminSetupSelectAppFilter.inc.php';
            break;

        default:
            # code...
            break;
    }
}








// if ($_POST["adminSetupSelect"] === 'professionals') {
//     echo 'professional';
// }

// if ($_POST["adminSetupSelect"] === 'clients') {
//     echo 'clients';
// }
// if ($_POST["adminSetupSelect"] === 'services') {
//     echo 'services';
// }
// if ($_POST["adminSetupSelect"] === 'appointments') {
//     echo 'appointments';
// }