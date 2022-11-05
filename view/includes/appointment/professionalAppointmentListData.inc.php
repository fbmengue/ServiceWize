<?php

use controller\AppointmentContr;
use controller\ProfessionalContr;
// use controller\ClientContr;
// use controller\ProfessionalContr;
use controller\ServiceContr;

session_start();

if (isset($_POST['appointmentID'])) {
    $appointmentID = $_POST['appointmentID'];
    $appointmentDate = $_POST['appointmentDate'];



    include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/appointment.classe.php';
    include __DIR__ . '/../../../controller/appointment-contr.classes.php';

    $newAppointmentEdit = new AppointmentContr();



    $appointmentDataList = $newAppointmentEdit->getProfAppointmentDataListByIDEmail($appointmentID, $_SESSION["userEmail"], $appointmentDate);



    $apointmentProfessionalID = $appointmentDataList[0]['professionalID'];
    $appointmentServiceID = $appointmentDataList[0]['serviceID'];
    $appointmentServiceDuration = $appointmentDataList[0]['appointmentDuration'];
    $appointmentServicePrice = $appointmentDataList[0]['appointmentPrice'];
    $appointmentTime = $appointmentDataList[0]['appointmentTime'];
    $appointmentClientID = $appointmentDataList[0]['clientID'];




    //Instancias
    // include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newServiceAvailable = new ServiceContr();

    //Roda erros
    $serviceList = $newServiceAvailable->getServiceListByProfessionalEmail($_SESSION["userEmail"]);

    // print_r("<pre>");
    // print_r($serviceList);
    // print_r("</pre>");
    // exit;

    ?>
<div class="col-md-12">
    <?php include __DIR__ . '/../client/clientListProfAppointmentEdit.inc.php'; ?>
</div>
<div class="row g-3 mt-0 ps-3 pe-0" id="divInputAppointmentServiceEdit">

    <div class="col-md-12 p-0" data-add="<?php echo $apointmentProfessionalID?>">
        <label for="selectServiceNameForProfessionalEdit" class="form-label">Service</label>
        <select id="selectServiceNameForProfessionalEdit" name="selectServiceNameForProfessionalEdit"
            onchange="showServiceDurationPriceEditForProfessional(); return false;" class="form-select form_data_edit"
            placeholder="">
            <option value=""></option>
            <?php
            foreach ($serviceList as $itemService) {
                if ($itemService['professionalID'] == $apointmentProfessionalID) {
                    ?>

            <option <?php echo ($itemService['serviceID'] === $appointmentServiceID) ? "selected" : ""; ?>
                value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice'] ?>">
                <?php echo $itemService['serviceName'] ; ?></option>
            <?php
                }
            }
            ?>
        </select>
    </div>

    <div class="col-md-6 ps-0 pe-3" data-add="<?php echo $apointmentProfessionalID?>">
        <label for="selectServiceDurationForProfessionalEdit" class="form-label">Duration</label>
        <select id="selectServiceDurationForProfessionalEdit" name="selectServiceDurationForProfessionalEdit"
            class="form-select" placeholder="" disabled>
            <option value=""></option>
            <?php
            foreach ($serviceList as $itemService) {
                if ($itemService['professional_professionalID'] == $apointmentProfessionalID) {
                    ?>
            <option <?php echo ($itemService['serviceTime'] === $appointmentServiceDuration) ? "selected" : ""; ?>
                value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>">
                <?php echo $itemService['time'] ?></option>
            <?php
                }
            }
            ?>
        </select>
    </div>

    <div class="col-md-6 ps-3 pe-0" data-add="<?php echo $apointmentProfessionalID?>">
        <label for="selectServicePriceForProfessionalEdit" class="form-label">Price</label>
        <select id="selectServicePriceForProfessionalEdit" name="selectServicePriceForProfessionalEdit"
            class="form-select" placeholder="" disabled>
            <option value=""></option>
            <?php
            foreach ($serviceList as $itemService) {
                if ($itemService['professional_professionalID'] == $apointmentProfessionalID) {
                    ?>
            <option <?php echo ($itemService['servicePrice'] === $appointmentServicePrice) ? "selected" : ""; ?>
                value="<?php echo $itemService['serviceID'] . "|" . $itemService['time'] . "|" . $itemService['servicePrice']  ?>">
                <?php echo $itemService['servicePrice'] ?></option>
            <?php
                }
            }
            ?>
        </select>
    </div>
</div>



<div class="col-md-12">
    <label for="inputAppointmentDateEdit" class="form-label">Date</label>
    <input type="date" class="form-control form_data_edit"
        onchange="showHoursAvailableEditForProfessional(); return false;" id="inputAppointmentDateEdit"
        name="inputAppointmentDateEdit" required value="<?php echo $appointmentDate; ?>">
</div>

<div class="col-md-12" id="divInputAppointmentTimeProfessionalEdit">
    <label for="inputAppointmentTimeEdit" class="form-label">Time</label>
    <select class="form-select form_data_edit" id="inputAppointmentTimeEdit" name="inputAppointmentTimeEdit"
        aria-label="Default select example">
        <option value="<?php echo $appointmentTime; ?>"><?php echo $appointmentTime; ?></option>
    </select>

</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit"
        id="appointmentButtonForProfessionalEdit-<?php echo $appointmentID; ?>"
        onclick="saveAppointmentEditForProfessional(this); return false;">Edit
        Appointment</button>
</div>


<?php
} else {
    echo "Error";
}