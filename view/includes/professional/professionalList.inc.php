<?php

use controller\ProfessionalContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/professional.classe.php';
    include __DIR__ . '/../../../controller/professional-contr.classes.php';

    //New Service
    $newProfessional = new ProfessionalContr();

    //Roda erros
    $professionalList = $newProfessional->getProfessionalList();
?>
<label for="selectProfessionalName" class="form-label">Professional</label>
<select id="selectProfessionalName" name="selectProfessionalName" placeholder="">
<option value=""></option>
    <?php
    foreach ($professionalList as $itemProfessional) {
        ?>

    <option value="<?php echo $itemProfessional['professionalID'] ?>"><?php echo $itemProfessional['professionalFullName'] ?></option>


        <?php
    }
    ?>
</select>


