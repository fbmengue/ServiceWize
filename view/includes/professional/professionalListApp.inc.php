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
<label for="inputProfessionalApp" class="form-label">Professional</label>
<select id="inputProfessionalApp" name="inputProfessionalApp" class="form-control form_data"
    onchange="showServicesPerProfessional(this); return false;" placeholder="">
    <option value=""></option>
    <?php
    foreach ($professionalListApp as $itemProfessionalApp) {
        ?>

    <option value="<?php echo $itemProfessionalApp['professionalID'] ?>">
        <?php echo $itemProfessionalApp['professionalFullName'] ?></option>


    <?php
    }
    ?>
</select>