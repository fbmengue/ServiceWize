<?php


if ($_POST["rowID"]) {
    $ID = $_POST["rowID"];
    ?>


<button id="send-<?php echo $ID;?>" class="send-button alert alert-success" type="submit" form="form" name="sendButton"
    onclick="sendEditAdminSetup(this);return false;">
    ENVIAR </button>
<button id="cancel-<?php echo $ID;?>" onclick="cancelAdminSetup(this);return false;"
    class="cancel-button alert alert-dark" type="button" name="cancelButton">
    CANCELAR </button>


<button id="delete-<?php echo $ID;?>" class="delete-button alert alert-danger" type="submit" form="form"
    onclick="deleteAdminSetup(this);return false;" name="deleteButton">
    DELETAR </button>

<?php }?>