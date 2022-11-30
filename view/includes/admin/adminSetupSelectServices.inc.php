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
<h2 class="widget-title" style="margin-top: 10px;">Service List Setup</h2>
<?php
foreach ($adminDataList as $itemList) {
    ?>
<div class="appointment-dayview col-sm-12 bg-widget mt-3 mb-3 p-3 rounded-3">
    <div id="adminSetupRow-<?php echo $itemList['serviceID'] ?>" class="row adminSetupRow">
        <div class="col-sm-1 col-id">
            <label for="serviceID" class="label-control">ID</label>
            <input class="form-control" type="number" value="<?php echo $itemList['serviceID'] ?>" name="serviceID"
                max="<?php echo $itemList['serviceID'] ?>" min="<?php echo $itemList['serviceID'] ?>" disabled>
            </input>
        </div>

        <div class="col-sm-2 col-id">
            <label for="serviceName" class="label-control">Service Name</label>
            <input class="form-control" name="serviceName" value="<?php echo $itemList['serviceName'] ?>" disabled>
        </div>

        <div class="col-sm-1 col-id">
            <label for="serviceTime" class="label-control">Duration</label>
            <input class="form-control" name="serviceTime" style="padding-left: 0.55rem;"
                value="<?php echo $itemList['time'] ?>" disabled>
        </div>

        <div class="col-sm-1 col-id">
            <label for="servicePrice" class="label-control">Price</label>
            <input class="form-control" name="servicePrice" style="padding-left: 0.55rem;"
                value="<?php echo $itemList['servicePrice'] ?>" disabled>
        </div>

        <div class="col-sm-2 col-id">
            <label for="professionalID" class="label-control">Professional ID</label>

            <input class="form-control" name="professionalID" type="number"
                value="<?php echo $itemList['professionalID'] ?>" disabled>
            </input>
        </div>

        <div class="col-sm-3 col-id">
            <label for="professionalEmail" class="label-control">Professional Email</label>

            <input class="form-control" name="professionalEmail" type="text"
                value="<?php echo $itemList['professionalEmail'] ?>" disabled>
            </input>
        </div>

        <div id="divButtonsSetup-<?php echo $itemList['serviceID'] ?>"
            class="col-sm-4 mt-3 gap-button d-flex align-items-end">
            <button id="edit-button-<?php echo $itemList['serviceID'] ?>" class="edit-button"
                onclick="editAdminSetup(this);return false;" type="button" name="editButton"> EDITAR

            </button>



        </div>

    </div>
</div>

<?php
}