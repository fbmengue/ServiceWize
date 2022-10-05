<?php

use controller\ServiceContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newService = new ServiceContr();

    //Roda erros
    $serviceList = $newService->getServiceList();
?>
<label for="selectServiceName" class="form-label">Service</label>
<select id="selectServiceName" name="selectServiceName" placeholder="">
<option value=""></option>
    <?php
    foreach ($serviceList as $itemService) {
        ?>

    <option value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice'] ?>"><?php echo $itemService['serviceName'] ?></option>


        <?php
    }
    ?>
</select>
</div>
<div class="col-md-6">
    <label for="selectServiceDuration" class="form-label">Duration</label>
    <select id="selectServiceDuration" name="selectServiceDuration" class="form-select" placeholder="">
    <option value=""></option>
    <?php
    foreach ($serviceList as $itemService) {
        ?>

        <option value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>"><?php echo $itemService['time'] ?></option>


        <?php
    }
    ?>
</select>
</div>
<div class="col-md-6">
    <label for="selectServicePrice" class="form-label">Price</label>
    <select id="selectServicePrice" name="selectServicePrice" class="form-select" placeholder="">
        <option value=""></option>
    <?php
    foreach ($serviceList as $itemService) {
        ?>

        <option value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>"><?php echo $itemService['servicePrice'] ?></option>


        <?php
    }
    ?>
</select>
