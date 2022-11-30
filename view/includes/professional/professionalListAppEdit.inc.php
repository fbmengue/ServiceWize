<?php

use controller\ProfessionalContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/professional.classe.php';
    include __DIR__ . '/../../../controller/professional-contr.classes.php';

    //New Service
    $newProfessionalApp = new ProfessionalContr();

    //Roda erros
    $professionalListApp = $newProfessionalApp->getProfessionalList();
?>
<label for="inputProfessionalAppEdit" class="form-label">Professional</label>
<select id="inputProfessionalAppEdit" name="inputProfessionalAppEdit" class="form-control form_data_edit"
    onchange="showServicesEditPerProfessional(this); return false;" placeholder="">
    <option value=""></option>
    <?php
    foreach ($professionalListApp as $itemProfessionalApp) {
        ?>

    <option <?php echo ($itemProfessionalApp['professionalID'] === $apointmentProfessionalID) ? "selected" : ""; ?>
        value="<?php echo $itemProfessionalApp['professionalID'] ?>">
        <?php echo $itemProfessionalApp['professionalFullName'] ?></option>


    <?php
    }
    ?>
</select>