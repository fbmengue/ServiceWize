<?php

use controller\ProfessionalContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    // include __DIR__ . '/../../../model/professional.classe.php';
    // include __DIR__ . '/../../../controller/professional-contr.classes.php';

    //New Service
    $newProfessionalEdit = new ProfessionalContr();

    //Roda erros
    $professionalListEdit = $newProfessionalEdit->getProfessionalList();
?>
<label for="selectProfessionalForClient" class="form-label">Professional</label>
<select id="selectProfessionalForClient<?php echo $item['appointmentID']; ?>" class="professional-client-edit"
    name="selectProfessionalForClient" placeholder="">

    <?php
    foreach ($professionalListEdit as $itemProfessional) {
        ?>

    <option <?php echo ($item['professionalID'] === $itemProfessional['professionalID']) ? "selected" : ""; ?>
        value="<?php echo $itemProfessional['professionalID'] ?>">
        <?php echo $itemProfessional['professionalFullName'] ?></option>


    <?php
    }
    ?>
</select>