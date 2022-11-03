<?php

use controller\ServiceContr;

session_start();
if (isset($_POST['selectProfessionalForClientEdit'])) {
    $professionalID = $_POST['selectProfessionalForClientEdit'];


    //Instancias
    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newServiceAvailable = new ServiceContr();
   // $professionalService = new ProfessionalContr();

    //Roda erros
    $serviceList = $newServiceAvailable->getServiceListByProfessionalID($professionalID);
   // $professionalListForService = $professionalService->getProfessionalList();


    // print_r("<pre>");
    // print_r($serviceList);
    // print_r("</pre>");
    // exit;
    ?>
<div class="col-md-12 p-0" data-add="<?php echo $professionalID?>">
    <label for="selectServiceNameForClientEdit" class="form-label">Service</label>
    <select id="selectServiceNameForClientEdit" name="selectServiceNameForClientEdit"
        onchange="showServiceDurationPriceEdit(); return false;" class="form-select form_data_edit" placeholder="">
        <option value=""></option>
        <?php
        foreach ($serviceList as $itemService) {
            if ($itemService['professionalID'] == $professionalID) {
                ?>

        <option
            value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice'] ?>">
            <?php echo $itemService['serviceName'] ; ?></option>
        <?php
            }
        }
        ?>
    </select>
</div>

<div class="col-md-6 ps-0 pe-3" data-add="<?php echo $professionalID?>">
    <label for="selectServiceDurationForClientEdit" class="form-label">Duration</label>
    <select id="selectServiceDurationForClientEdit" name="selectServiceDurationForClientEdit" class="form-select"
        placeholder="" disabled>
        <option value=""></option>
        <?php
        foreach ($serviceList as $itemService) {
            if ($itemService['professional_professionalID'] == $professionalID) {
                ?>
        <option
            value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>">
            <?php echo $itemService['time'] ?></option>
        <?php
            }
        }
        ?>
    </select>
</div>

<div class="col-md-6 ps-3 pe-0" data-add="<?php echo $professionalID?>">
    <label for="selectServicePriceForClientEdit" class="form-label">Price</label>
    <select id="selectServicePriceForClientEdit" name="selectServicePriceForClientEdit" class="form-select"
        placeholder="" disabled>
        <option value=""></option>
        <?php
        foreach ($serviceList as $itemService) {
            if ($itemService['professional_professionalID'] == $professionalID) {
                ?>
        <option
            value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>">
            <?php echo $itemService['servicePrice'] ?></option>
        <?php
            }
        }
        ?>
    </select>
</div>
<?php
} else {
    echo "nao entrou no if";
}