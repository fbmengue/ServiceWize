<?php

use controller\ServiceContr;

session_start();



    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    //include __DIR__ . '/../../../model/service.classe.php';
    //include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newMyService = new ServiceContr();

    //Roda erros
    $myServiceList = $newMyService->getMyServiceList($_SESSION["userEmail"]);
?>
<label for="selectServiceName" class="form-label">Service</label>
<select id="selectServiceName" name="selectServiceName" placeholder="" class="form_data_professional">
    <option value=""></option>
    <?php
    foreach ($myServiceList as $itemMyService) {
        ?>

    <option
        value="<?php echo $itemMyService['serviceID'] . "|" . $itemMyService['time'] . "|" . $itemMyService['servicePrice'] ?>">
        <?php echo $itemMyService['serviceName'] ?></option>


    <?php
    }
    ?>
</select>
</div>
<div class="col-md-6">
    <label for="selectServiceDuration" class="form-label">Duration</label>
    <select id="selectServiceDuration" name="selectServiceDuration" class="form-select form_data_professional" disabled
        placeholder="">
        <option value=""></option>
        <?php
        foreach ($myServiceList as $itemMyService) {
            ?>

        <option
            value="<?php echo $itemMyService['serviceID'] . "|" . $itemMyService['time'] . "|" . $itemMyService['servicePrice']  ?>">
            <?php echo $itemMyService['time'] ?></option>


        <?php
        }
        ?>
    </select>
</div>
<div class="col-md-6">
    <label for="selectServicePrice" class="form-label">Price</label>
    <select id="selectServicePrice" name="selectServicePrice" class="form-select form_data_professional" disabled
        placeholder="">
        <option value=""></option>
        <?php
        foreach ($myServiceList as $itemMyService) {
            ?>

        <option
            value="<?php echo $itemMyService['serviceID'] . "|" . $itemMyService['time'] . "|" . $itemMyService['servicePrice']  ?>">
            <?php echo $itemMyService['servicePrice'] ?></option>


        <?php
        }
        ?>
    </select>