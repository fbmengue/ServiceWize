<?php

use controller\ClientContr;

session_start();


    //Instancias
    // include __DIR__ . '/../../../model/db.classes.php';
    // include __DIR__ . '/../../../model/client.classe.php';
    // include __DIR__ . '/../../../controller/client-contr.classes.php';

    //New Client
    $newClient = new ClientContr();

    //Roda erros
    $clientList = $newClient->getClientList();

?>

<label for="selectClientName" class="form-label">Client Full Name</label>
<select id="selectClientName" name="selectClientName" required placeholder="" class="form_data">
    <option value=""></option>
    <?php
    foreach ($clientList as $itemClient) {
        ?>

    <option
        value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
        <?php echo $itemClient['clientFullName'] ?></option>


    <?php
    }
    ?>
</select>
</div>
<div class="col-md-12">
    <label for="selectClientEmail" class="form-label">Client Email</label>
    <select id="selectClientEmail" name="selectClientEmail" required placeholder="" class="form_data">
        <option value=""></option>
        <?php
        foreach ($clientList as $itemClient) {
            ?>

        <option
            value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
            <?php echo $itemClient['clientEmail'] ?></option>


        <?php
        }
        ?>
    </select>
</div>
<div class="col-md-6">
    <label for="selectClientBirthDate" class="form-label">Date of Birth</label>
    <select id="selectClientBirthDate" name="selectClientBirthDate" placeholder="" class="form_data">
        <option value=""></option>
        <?php
        foreach ($clientList as $itemClient) {
            ?>

        <option
            value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
            <?php echo $itemClient['clientBirthDate'] ?>
        </option>


        <?php
        }
        ?>
    </select>
</div>
<div class="col-md-6">
    <label for="selectClientMobile" class="form-label">Client Mobile</label>
    <select id="selectClientMobile" name="selectClientMobile" placeholder="" class="form_data">
        <option value=""></option>
        <?php
        foreach ($clientList as $itemClient) {
            ?>

        <option
            value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
            <?php echo $itemClient['clientMobile'] ?></option>


        <?php
        }
        ?>
    </select>