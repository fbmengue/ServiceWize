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
<style>
.selectize-input {
    height: 38px;
    line-height: 1.8;
}
</style>

<div class="col-sm-3 col-id">
    <label for="filterClientEmail" class="label-control">Filter BY Client Email</label>
    <select id="filterClientEmail" style="height: 38px;" name="filterClientEmail" class="filter_data">
        <option value=""></option>
        <?php
        foreach ($clientList as $itemClient) {
            ?>

        <option value="<?php echo $itemClient['clientEmail'] ?>">
            <?php echo $itemClient['clientEmail'] ?></option>


        <?php
        }
        ?>
    </select>
</div>