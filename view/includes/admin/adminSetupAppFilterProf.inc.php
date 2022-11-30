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
<div class="col-sm-3 col-id">
    <label for="filterProfessional" class="label-control">Professional</label>
    <select id="filterProfessional" name="filterProfessional" class="form-control filter_data" placeholder="">
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
</div>