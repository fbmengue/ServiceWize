<?php

use controller\ProfessionalContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    // include __DIR__ . '/../../../model/professional.classe.php';
    // include __DIR__ . '/../../../controller/professional-contr.classes.php';

    //New Service
    $newProfessional = new ProfessionalContr();

    //Roda erros
    $professionalList = $newProfessional->getProfessionalList();
?>
<label for="selectProfessionalForClientAdd" class="form-label">Professional</label>
<select id="selectProfessionalForClientAdd" name="selectProfessionalForClientAdd" placeholder=""
    onchange="showServicesAvailableForClient(); return false;" class="form-select form_data">
    <option value=""></option>
    <?php
    foreach ($professionalList as $itemProfessional) {
        ?>

    <option value="<?php echo $itemProfessional['professionalID'] ?>">
        <?php echo $itemProfessional['professionalFullName'] ?></option>


    <?php
    }
    ?>
</select>