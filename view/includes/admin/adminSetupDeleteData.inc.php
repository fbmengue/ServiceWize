<?php

//New appointment list by date

use controller\AdminContr;

if (isset($_POST["adminSetupSelect"])) {
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/admin.classe.php';
    include __DIR__ . '/../../../controller/admin-contr.classes.php';

    $admin = new AdminContr();

    $adminSetupSelect = $_POST["adminSetupSelect"];



    if ($adminSetupSelect === 'professionals') {
        $professionalID = $_POST["ID"];
        $admin->deleteAdminSetupDataProfessional($professionalID);

        $dataChanged = 'Professional';
    }

    if ($adminSetupSelect === 'clients') {
        $clientID = $_POST["ID"];
        $admin->deleteAdminSetupDataClient($clientID);

        $dataChanged = 'Client';
    }
    if ($adminSetupSelect === 'services') {
        $serviceID = $_POST["ID"];

        $admin->deleteAdminSetupDataService($serviceID);

        $dataChanged = 'Service';
    }
    if ($adminSetupSelect === 'appointments') {
        $appID = $_POST["ID"];

        $admin->deleteAdminSetupDataAppointment($appID);
        $dataChanged = 'Appointment';
    }
  //Roda erros
    echo '<div class="alert alert-success" style="width: 350px;">' . $dataChanged . ' Deleted Successfully</div>';
}