<?php

use controller\ClientContr;

session_start();


    //Instancias
    // include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/client.classe.php';
    include __DIR__ . '/../../../controller/client-contr.classes.php';

    //New Client
    $newClient = new ClientContr();

    //Roda erros
    $clientList = $newClient->getClientList();

?>

<label for="selectClientNameEdit" class="form-label">Client Full Name</label>
<select id="selectClientNameEdit" name="selectClientNameEdit" required placeholder="" class="form_data_edit">
    <option value=""></option>
    <?php
    foreach ($clientList as $itemClient) {
        ?>

    <option <?php echo ($itemClient['clientID'] === $appointmentClientID) ? "selected" : ""; ?>
        value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
        <?php echo $itemClient['clientFullName'] ?></option>


    <?php
    }
    ?>
</select>
</div>
<div class="col-md-12">
    <label for="selectClientEmailEdit" class="form-label">Client Email</label>
    <select id="selectClientEmailEdit" name="selectClientEmailEdit" required placeholder="" class="form_data_edit">
        <option value=""></option>
        <?php
        foreach ($clientList as $itemClient) {
            ?>

        <option <?php echo ($itemClient['clientID'] === $appointmentClientID) ? "selected" : ""; ?>
            value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
            <?php echo $itemClient['clientEmail'] ?></option>


        <?php
        }
        ?>
    </select>
</div>
<div class="col-md-6">
    <label for="selectClientBirthDateEdit" class="form-label">Date of Birth</label>
    <select id="selectClientBirthDateEdit" name="selectClientBirthDateEdit" placeholder="" class="form_data_edit"
        disabled>
        <option value=""></option>
        <?php
        foreach ($clientList as $itemClient) {
            ?>

        <option <?php echo ($itemClient['clientID'] === $appointmentClientID) ? "selected" : ""; ?>
            value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
            <?php echo $itemClient['clientBirthDate'] ?>
        </option>


        <?php
        }
        ?>
    </select>
</div>
<div class="col-md-6">
    <label for="selectClientMobileEdit" class="form-label">Client Mobile</label>
    <select id="selectClientMobileEdit" name="selectClientMobileEdit" placeholder="" class="form_data_edit">
        <option value=""></option>
        <?php
        foreach ($clientList as $itemClient) {
            ?>

        <option <?php echo ($itemClient['clientID'] === $appointmentClientID) ? "selected" : ""; ?>
            value="<?php echo $itemClient['clientID'] . "|" . $itemClient['clientFullName'] . "|" . $itemClient['clientEmail'] . "|" . $itemClient['clientBirthDate'] . "|" . $itemClient['clientMobile']; ?>">
            <?php echo $itemClient['clientMobile'] ?></option>


        <?php
        }
        ?>
    </select>