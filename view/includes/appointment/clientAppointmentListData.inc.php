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



    $appointmentDataList = $newAppointmentEdit->getAppointmentDataListByIDEmail($appointmentID, $_SESSION["userEmail"], $appointmentDate);
    // print_r("<pre>");
    // print_r($appointmentDataList);
    // print_r("</pre>");
    // exit;

    $apointmentProfessionalID = $appointmentDataList[0]['professionalID'];
    $appointmentServiceID = $appointmentDataList[0]['serviceID'];
    $appointmentServiceDuration = $appointmentDataList[0]['appointmentDuration'];
    $appointmentServicePrice = $appointmentDataList[0]['appointmentPrice'];
    $appointmentTime = $appointmentDataList[0]['appointmentTime'];

    // print_r("<pre>");
    // print_r($appointmentDataList);
    // print_r("</pre>");
    // exit;

    //Instancias
    // include __DIR__ . '/../../../model/db.classes.php';
    include __DIR__ . '/../../../model/service.classe.php';
    include __DIR__ . '/../../../controller/service-contr.classes.php';

    //New Service
    $newServiceAvailable = new ServiceContr();
   // $professionalService = new ProfessionalContr();

    //Roda erros
    $serviceList = $newServiceAvailable->getServiceListByProfessionalID($apointmentProfessionalID);
   // $professionalListForService = $professionalService->getProfessionalList();
    // print_r("<pre>");
    // print_r($professionalID);
    // print_r("</pre>");
    // exit;

    // print_r("<pre>");
    // print_r($serviceList);
    // print_r("</pre>");
    // exit;
    //Instancias
    //include __DIR__ . '/../../../model/db.classes.php';
    //include __DIR__ . '/../../../model/client.classe.php';
    //include __DIR__ . '/../../../controller/client-contr.classes.php';
    include __DIR__ . '/../../../model/professional.classe.php';
    include __DIR__ . '/../../../controller/professional-contr.classes.php';

    // //New Client
    // $editClientAppointment = new ClientContr();

    // $newProfessionalEdit = new ProfessionalContr();

    // //Roda erros
    // $professionalListEdit = $newProfessionalEdit->getProfessionalList();
//New Service
    $newProfessionalEdit = new ProfessionalContr();

//Roda erros
    $professionalListEdit = $newProfessionalEdit->getProfessionalList();

    // print_r("<pre>");
    // print_r($professionalListEdit);
    // print_r("</pre>");
    // exit;
    ?>
<div class="col-md-12">
    <label for="selectProfessionalForClientEdit" class="form-label">Professional</label>
    <select id="selectProfessionalForClientEdit" class="form-select form_data_edit"
        name="selectProfessionalForClientEdit" placeholder=""
        onchange="showServicesAvailableEditForClient(); return false;">

        <?php
        foreach ($professionalListEdit as $itemProfessional) {
            ?>

        <option <?php echo ($itemProfessional['professionalID'] === $apointmentProfessionalID) ? "selected" : ""; ?>
            value="<?php echo $itemProfessional['professionalID'] ?>">
            <?php echo $itemProfessional['professionalFullName'] ?></option>


        <?php
        }
        ?>
    </select>
</div>

<div class="row g-3 mt-0 ps-3 pe-0" id="divInputAppointmentServiceEdit">

    <div class="col-md-12 p-0" data-add="<?php echo $apointmentProfessionalID?>">
        <label for="selectServiceNameForClientEdit" class="form-label">Service</label>
        <select id="selectServiceNameForClientEdit" name="selectServiceNameForClientEdit"
            onchange="showServiceDurationPriceEdit(); return false;" class="form-select form_data_edit" placeholder="">
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
        <label for="selectServiceDurationForClientEdit" class="form-label">Duration</label>
        <select id="selectServiceDurationForClientEdit" name="selectServiceDurationForClientEdit" class="form-select"
            placeholder="" disabled>
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
        <label for="selectServicePriceForClientEdit" class="form-label">Price</label>
        <select id="selectServicePriceForClientEdit" name="selectServicePriceForClientEdit" class="form-select"
            placeholder="" disabled>
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
    <input type="date" class="form-control form_data_edit" onchange="showHoursAvailableEditForClient(); return false;"
        id="inputAppointmentDateEdit" name="inputAppointmentDateEdit" required value="<?php echo $appointmentDate; ?>">
</div>

<div class="col-md-12" id="divInputAppointmentTimeEdit">
    <label for="inputAppointmentTimeEdit" class="form-label">Time</label>
    <select class="form-select form_data_edit" id="inputAppointmentTimeEdit" name="inputAppointmentTimeEdit"
        aria-label="Default select example">
        <option value="<?php echo $appointmentTime; ?>"><?php echo $appointmentTime; ?></option>
    </select>

</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary" form="form-edit-appointment" name="submit"
        formaction="view/includes/client/appointmentEdit.inc.php">Edit
        Appointment</button>
</div>


<?php
} else {
    echo "nao entrou no if";
}