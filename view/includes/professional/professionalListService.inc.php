<?php

use controller\ProfessionalContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    //include __DIR__ . '/../../../model/professional.classe.php';
    //include __DIR__ . '/../../../controller/professional-contr.classes.php';

    //New Service
    $newProfessionalService = new ProfessionalContr();

    //Roda erros
    $professionalListService = $newProfessionalService->getProfessionalList();
?>
<label for="inputServiceProfessional" class="form-label">Professional</label>
<select id="inputServiceProfessional" name="inputServiceProfessional" placeholder="">
<option value=""></option>
    <?php
    foreach ($professionalListService as $itemProfessionalService) {
        ?>

    <option value="<?php echo $itemProfessionalService['professionalID'] ?>"><?php echo $itemProfessionalService['professionalFullName'] ?></option>


        <?php
    }
    ?>
</select>


