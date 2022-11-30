<?php

//New appointment list by date

use controller\AdminContr;

include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/admin.classe.php';
    include __DIR__ . '/../../../controller/admin-contr.classes.php';




$admin = new AdminContr();

$adminSetupSelect = $_POST["adminSetupSelect"];

$clientEmail = $_POST["filterClientEmail"];
$appointmenteDate = $_POST["filterAppointmentDate"];
$appointmenteCanceled = $_POST["filterAppointmentCanceled"];
$appointmenteProfessional = $_POST["filterProfessional"];
  //Roda erros
  $adminDataList = $admin->getAdminSetupData($adminSetupSelect, $clientEmail, $appointmenteDate, $appointmenteCanceled, $appointmenteProfessional);



foreach ($adminDataList as $itemList) {
    ?>
<div class="appointment-dayview col-sm-12 bg-widget mt-3 mb-3 p-3 rounded-3">
    <div id="adminSetupRow-<?php echo $itemList['appointmentID'] ?>" class="row adminSetupRow">
        <div class="row appointmentRow">
            <div class="col-sm-2 col-id">
                <label for="appID" class="label-control">Appointment ID</label>

                <input class="form-control" type="number" value="<?php echo $itemList['appointmentID'] ?>"
                    max="<?php echo $itemList['appointmentID'] ?>" min="<?php echo $itemList['appointmentID'] ?>"
                    name="appID" disabled>
                </input>
            </div>

            <div class="col-sm-3 col-id">
                <label for="appDate" class="label-control">Date</label>
                <input class="form-control" name="appDate" value="<?php echo $itemList['appointmentDateView'] ?>"
                    disabled>
            </div>

            <div class="col-sm-3 col-id">
                <label for="appStartTime" class="label-control">Start Time</label>
                <input class="form-control" name="appStartTime"
                    value="<?php echo $itemList['appointmentStartTimeView'] ?>" disabled>
            </div>

            <div class="col-sm-2 col-id">
                <label for="appEndTime" class="label-control">End Time</label>
                <input class="form-control" style="padding-left: 0.55rem;" name="appEndTime"
                    value="<?php echo $itemList['appointmentEndTimeView'] ?>" disabled>
            </div>

            <div class="col-sm-1 col-id">
                <label for="appCanceled" class="label-control">Canceled</label>
                <input class="form-control" name="appCanceled" type="text"
                    value="<?php echo $itemList['appointmentCanceled'] ?>" disabled>
                </input>
            </div>
        </div>
        <div class="row appointmentRow">
            <div class="col-sm-2 col-id">
                <label for="clientID" class="label-control">Client ID</label>
                <input class="form-control" name="clientID" type="number" value="<?php echo $itemList['clientID'] ?>"
                    disabled>
                </input>
            </div>

            <div class="col-sm-3 col-id">
                <label for="clientFullName" class="label-control">Client Name</label>
                <input class="form-control" name="clientFullName" value="<?php echo $itemList['clientFullName'] ?>"
                    disabled>
            </div>

            <div class="col-sm-3 col-id">
                <label for="clientEmail" class="label-control">Client Email</label>
                <input class="form-control" name="clientEmail" value="<?php echo $itemList['clientEmail'] ?>" disabled>
            </div>

        </div>
        <div class="row appointmentRow">
            <div class="col-sm-2 col-id">
                <label for="professionalID" class="label-control">Professional ID</label>
                <input class="form-control" name="professionalID" type="number"
                    value="<?php echo $itemList['professionalID'] ?>" disabled>
                </input>
            </div>

            <div class="col-sm-3 col-id">
                <label for="professionalFullName" class="label-control">Professional Name</label>
                <input class="form-control" name="professionalFullName"
                    value="<?php echo $itemList['professionalFullName'] ?>" disabled>
            </div>

            <div class="col-sm-3 col-id">
                <label for="professionalEmail" class="label-control">Professional Email</label>
                <input class="form-control" name="professionalEmail"
                    value="<?php echo $itemList['professionalEmail'] ?>" disabled>
            </div>
        </div>
        <div class="row appointmentRow">
            <div class="col-sm-2 col-id">
                <label for="serviceID" class="label-control">Service ID</label>
                <input class="form-control" name="serviceID" type="number" value="<?php echo $itemList['serviceID'] ?>"
                    disabled>
                </input>
            </div>

            <div class="col-sm-3 col-id">
                <label for="serviceName" class="label-control">Service Name</label>
                <input class="form-control" name="serviceName" value="<?php echo $itemList['serviceName'] ?>" disabled>
            </div>

            <div class="col-sm-3 col-id">
                <label for="servicePrice" class="label-control">Service Price</label>
                <input class="form-control" name="servicePrice" value="<?php echo $itemList['servicePrice'] ?>"
                    disabled>
            </div>
        </div>


        <div id="divButtonsSetup-<?php echo $itemList['appointmentID'] ?>"
            class="col-sm-4 mt-3 gap-button d-flex align-items-end">
            <button id="edit-button-<?php echo $itemList['appointmentID'] ?>" class="edit-button"
                onclick="editAdminSetupFilter(this);return false;" type="button" name="editButton"> EDITAR

            </button>



        </div>

    </div>
</div>

<?php
}