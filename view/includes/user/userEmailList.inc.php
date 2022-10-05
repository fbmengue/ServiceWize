<?php

use controller\UserContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/user.classe.php';
    include __DIR__ . '/../../../controller/user-contr.classes.php';

    //New Service
    $newUserEmail = new UserContr();

    //Roda erros
   $userEmailList = $newUserEmail->getUserEmailList();
?>
<label for="inputProfessionalEmail" class="form-label">Professional</label>
<select id="inputProfessionalEmail" name="inputProfessionalEmail" placeholder="">
<option value=""></option>
    <?php
    foreach ($userEmailList as $itemUserEmail) {
        ?>

    <option value="<?php echo $itemUserEmail['userEmail'] ?>"><?php echo $itemUserEmail['userEmail'] ?></option>


        <?php
    }
    ?>
</select>


