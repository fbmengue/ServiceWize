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
<h2 class="widget-title" style="margin-top: 10px;">Professional List Setup</h2>
<?php
foreach ($adminDataList as $itemList) {
    ?>
<div class="appointment-dayview col-sm-12 bg-widget mt-3 mb-3 p-3 rounded-3">
    <div id="adminSetupRow-<?php echo $itemList['professionalID'] ?>" class="row adminSetupRow">
        <div class="col-sm-1 col-id">
            <label for="professionalID" class="label-control">ID</label>

            <input class="form-control" type="number" value="<?php echo $itemList['professionalID'] ?>"
                name="professionalID" max="<?php echo $itemList['professionalID'] ?>"
                min="<?php echo $itemList['professionalID'] ?>" disabled>
            </input>
        </div>

        <div class="col-sm-3 col-id">
            <label for="professionalFullName" class="label-control">Full Name</label>
            <input class="form-control" value="<?php echo $itemList['professionalFullName'] ?>"
                name="professionalFullName" disabled>
        </div>

        <div class="col-sm-3 col-id">
            <label for="professionalEmail" class="label-control">Email</label>
            <input class="form-control" value="<?php echo $itemList['professionalEmail'] ?>" name="professionalEmail"
                disabled>
        </div>

        <div id="divButtonsSetup-<?php echo $itemList['professionalID'] ?>"
            class="col-sm-4 mt-3 gap-button d-flex align-items-end">
            <button id="edit-button-<?php echo $itemList['professionalID'] ?>" class="edit-button"
                onclick="editAdminSetup(this);return false;" type="button" name="editButton"> EDITAR

            </button>



        </div>

    </div>
</div>

<?php
}