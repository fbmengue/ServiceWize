<?php

use controller\ProfessionalContr;
use controller\ServiceContr;

session_start();
if (true) {
    //$professionalID = $_POST['professionalID'];


    //Instancias
   // include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newService = new ServiceContr();
    $professionalService = new ProfessionalContr();

    //Roda erros
    $serviceList = $newService->getServiceList();
    $professionalListForService = $professionalService->getProfessionalList();



    foreach ($professionalListForService as $itemProfessional) {
        ?>
<div class="col-md-12 hide" data-edit="<?php echo $itemProfessional['professionalID']?>">    
<label for="selectServiceName" class="form-label">Service</label>
<select id="selectServiceName-<?php echo $itemProfessional['professionalID']?>"
name="selectServiceName" class="form-select" placeholder="">
<option value=""></option>
        <?php
        foreach ($serviceList as $itemService) {
            if ($itemService['professional_professionalID'] === $itemProfessional['professionalID']) {
                ?>
                <option value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice'] ?>"><?php echo $itemService['serviceName'] ?></option>
                <?php
            }
        }
        ?>
</select>
</div>
<div class="col-md-6 hide" data-edit="<?php echo $itemProfessional['professionalID']?>">
    <label for="selectServiceDuration" class="form-label">Duration</label>
    <select id="selectServiceDuration-<?php echo $itemProfessional['professionalID']?>"
    name="selectServiceDuration" class="form-select" placeholder="" disabled>
    <option value=""></option>
        <?php
        foreach ($serviceList as $itemService) {
            if ($itemService['professional_professionalID'] === $itemProfessional['professionalID']) {
                ?>
                <option value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>"><?php echo $itemService['time'] ?></option>
                <?php
            }
        }
        ?>
</select>
</div>
<div class="col-md-6 hide" data-edit="<?php echo $itemProfessional['professionalID']?>">
    <label for="selectServicePrice" class="form-label">Price</label>
    <select id="selectServicePrice-<?php echo $itemProfessional['professionalID']?>" 
    name="selectServicePrice" class="form-select" placeholder="" disabled>
        <option value=""></option>
        <?php
        foreach ($serviceList as $itemService) {
            if ($itemService['professional_professionalID'] === $itemProfessional['professionalID']) {
                ?>
                 <option value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>"><?php echo $itemService['servicePrice'] ?></option>
                <?php
            }
        }
        ?>
</select>
</div>
        <?php
    }
}
