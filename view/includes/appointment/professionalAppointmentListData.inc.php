<?php

use controller\ProfessionalContr;

session_start();


    //Instancias
    // include __DIR__ . '/../../../model/db.classes.php';
    // include __DIR__ . '/../../../model/client.classe.php';
    // include __DIR__ . '/../../../controller/client-contr.classes.php';
    //include __DIR__ . '/../../../model/professional.classe.php';
    //include __DIR__ . '/../../../controller/professional-contr.classes.php';

    //New Client
    $editClientAppointment = new ProfessionalContr();


?>

<div class="col-md-12">
    <?php include __DIR__ . '/../../includes/professional/clientDataForProfessionalEdit.inc.php';?>
</div>

<?php include __DIR__ . '/../../includes/service/serviceListForProfessionalEdit.inc.php'; ?>

<div class="col-md-12">
    <label for="inputAppointmentDate" class="form-label">Date</label>
    <input type="date" class="form-control" id="inputAppointmentDate" name="inputAppointmentDate" required
        value="<?php echo $item['appointmentDate'];?>">
</div>

<div class="col-md-12">
    <label for="inputAppointmentTime" class="form-label">Time</label>
    <select class="form-select" id="inputAppointmentTime" name="inputAppointmentTime"
        aria-label="Default select example">
        <option selected><?php echo substr($item['appointmentStartTime'], 0, -3);?></option>
        <option value="09:00">09:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="13:00">13:00</option>
        <option value="16:00">16:00</option>
    </select>
</div>