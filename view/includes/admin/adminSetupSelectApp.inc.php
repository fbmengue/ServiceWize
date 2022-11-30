<?php

//New appointment list by date

use controller\AdminContr;

include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/admin.classe.php';
    include __DIR__ . '/../../../controller/admin-contr.classes.php';




$admin = new AdminContr();

$adminSetupSelect = $_POST["adminSetupSelect"];
  //Roda erros
  $adminDataList = $admin->getAdminSetupData($adminSetupSelect, $clientEmail, $appointmenteDate, $appointmenteCanceled, $appointmenteProfessional);


?>

<h2 class="widget-title" style="margin-top: 10px;">Appointment List Setup</h2>
<div class="col-sm-12 bg-widget mt-3 mb-3 p-3 rounded-3" style="text-align: start;">
    <div id="filterRow" class="row">

        <?php include __DIR__ . '/adminSetupAppFilterClients.inc.php'; ?>
        <div class="col-sm-3 col-id">
            <label for="filterAppointmentDate" class="label-control">Filter BY Date</label>
            <input type="date" class="form-control filter_data" id="filterAppointmentDate" name="filterAppointmentDate">
        </div>
        <div class="col-sm-2 col-id">
            <label for="filterAppointmentCanceled" class="label-control">Filter BY Cancelation</label>
            <select id="filterAppointmentCanceled" name="filterAppointmentCanceled" required
                class="form-control filter_data">
                <option value=""></option>
                <option value="1">Canceled</option>
                <option value="0">Not Canceled</option>
            </select>
        </div>
        <?php include __DIR__ . '/adminSetupAppFilterProf.inc.php'; ?>
        <div class="col-sm-1 col-id justify-content-end p-0">
            <button id="filter-button" class="filter-button" onclick="loadFilterAdminSetup(this);return false;"
                type="button" name="editButton"> FILTER

            </button>
        </div>

    </div>
</div>