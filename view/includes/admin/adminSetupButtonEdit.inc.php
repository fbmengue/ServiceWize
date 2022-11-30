<?php


if ($_POST["rowID"]) {
    $ID = $_POST["rowID"];
    ?>


<button id="edit-button-<?php echo $ID ?>" class="edit-button" onclick="editAdminSetup(this);return false;"
    type="button" name="editButton"> EDITAR
</button>

<?php }?>