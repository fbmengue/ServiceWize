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
<h2 class="widget-title" style="margin-top: 10px;">CLIENT List Setup</h2>
<?php
foreach ($adminDataList as $itemList) {
    ?>
<div class="appointment-dayview col-sm-12 bg-widget mt-3 mb-3 p-3 rounded-3">
    <div id="adminSetupRow-<?php echo $itemList['clientID']; ?>" class="row adminSetupRow">
        <div class="col-sm-1 col-id">
            <label for="serviceID" class="label-control">ID</label>

            <input class="form-control" type="number" value="<?php echo $itemList['clientID']; ?>" name="clientID"
                max="<?php echo $itemList['clientID']; ?>" min="<?php echo $itemList['clientID']; ?>" disabled>
            </input>
        </div>

        <div class="col-sm-3 col-id">
            <label for="clientFullName" class="label-control">Client Name</label>
            <input class="form-control" name="clientFullName" value="<?php echo $itemList['clientFullName']; ?>"
                disabled>
        </div>

        <div class="col-sm-3 col-id">
            <label for="clientEmail" class="label-control">Client Email</label>
            <input class="form-control" name="clientEmail" value="<?php echo $itemList['clientEmail']; ?>" disabled>
        </div>

        <div class="col-sm-2 col-id">
            <label for="clientBirthDate" class="label-control">Client Birth Date</label>
            <input class="form-control" name="clientBirthDate" style="padding-left: 0.55rem;"
                value="<?php echo $itemList['birthDate'];?>" disabled>
        </div>

        <div class="col-sm-2 col-id">
            <label for="clientMobile" class="label-control">Client Mobile</label>

            <input class="form-control" name="clientMobile" type="text" value="<?php echo $itemList['clientMobile']; ?>"
                disabled>
            </input>
        </div>



        <div id="divButtonsSetup-<?php echo $itemList['clientID'] ?>"
            class="col-sm-4 mt-3 gap-button d-flex align-items-end">
            <button id="edit-button-<?php echo $itemList['clientID'] ?>" class="edit-button"
                onclick="editAdminSetup(this);return false;" type="button" name="editButton"> EDITAR

            </button>



        </div>

    </div>
</div>

<?php
}