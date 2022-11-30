<?php

session_start();

//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

include __DIR__ . '/../../../model/db.classes.php';

include __DIR__ . '/../../../model/client.classe.php';
include __DIR__ . '/../../../controller/client-contr.classes.php';

include __DIR__ . '/../../../model/service.classe.php';
include __DIR__ . '/../../../controller/service-contr.classes.php';

?>



<section class="d-flex flex-column align-items-center pt-4 pb-8 bg-default main-content">




    <!-- ADD WELCOME WIDGET -->
    <div class="d-flex flex-column w-100 align-items-center rounded-2 " style="max-width: 1070px">
        <div class="w-100 p-3 bg-widget pt-3">
            <div class="profile d-flex flex-row pt-1 justify-content-between">
                <div class="welcome-container d-flex flex-wrap flex-row justify-content-between">
                    <div class="name w-50 d-flex flex-column">
                        <h2 class="widget-title" translate="">Welcome back,</h2>
                        <p class="name-label"><?php echo $_SESSION["userFullName"]?> </p>
                    </div>
                    <div class="balance w-50 flex-column">

                    </div>
                    <div class="info-list d-flex w-100 flex-row justify-content-between">
                        <div class="info-label amount">
                            <p class="title" translate="">Monthly Earning</p>
                            <p class="amount earning"># Coming Soon #</p>
                        </div>
                        <div class="info-label amount">
                            <p class="title" translate="">Monthly Services</p>
                            <p class="amount expense"># Coming Soon #</p>
                        </div><a class="info-label report" href="#">
                            See Reports Coming Soon
                        </a>
                    </div>
                </div>
                <div class="quick-add-menu">
                    <h2 class="widget-title" translate="">New adds</h2>
                    <ul class="btn-list">
                        <li class="btn-action">


                            <button class="quick-add-button" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasAppoint" aria-controls="offcanvasAppoint">
                                Appointment
                            </button>

                            <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasAppoint"
                                aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add New Appointment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <span id="messageProfessionalAppAdd"></span>
                                    <form class="row g-3" id="form-add-appointment" method="POST">
                                        <div class="col-md-12">
                                            <?php include __DIR__ . '/../../includes/client/clientList.inc.php'; ?>
                                        </div>

                                        <div class="col-md-12">
                                            <?php include __DIR__ . '/../../includes/service/myServiceList.inc.php'; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputAppointmentDateProfessionalAdd"
                                                class="form-label">Date</label>
                                            <input type="date" class="form-control form_data_professional"
                                                id="inputAppointmentDateProfessionalAdd"
                                                name="inputAppointmentDateProfessionalAdd"
                                                onchange="showHoursAvailableForProfessional(); return false;" required>
                                        </div>


                                        <div class="col-md-12" id="divInputAppointmentTimeProfessional">


                                        </div>



                                        <div class="col-12">
                                            <button type="submit" id="appointmentButtonForProfessionalAdd"
                                                class="btn btn-primary" name="submit"
                                                onclick="saveAppointmentForProfessional(); return false;">Add
                                                Client and Appointment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>




                        </li>
                        <li class="btn-action">

                            <button class="quick-add-button" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasServices" aria-controls="offcanvasServices">
                                Service
                            </button>


                            <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasServices"
                                aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add New Service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <span id="messageProfessionalServiceAdd"></span>
                                    <form class="row g-3" id="form-add-service" method="POST">
                                        <div class="col-12">
                                            <label for="inputServiceName" class="form-label">Service Name</label>
                                            <input type="text" class="form-control form_data_professional"
                                                id="inputServiceName" name="inputServiceName" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputServiceDuration" class="form-label">Duration</label>
                                            <input type="text" class="form-control form_data_professional"
                                                id="inputServiceDuration" name="inputServiceDuration"
                                                data-mask="00/00/0000" data-mask-reverse="true" required />

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPrice" class="form-label">Price</label>
                                            <input type="text" class="form-control form_data_professional"
                                                id="inputServicePrice" name="inputServicePrice" value="" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"
                                                id="serviceButtonForProfessionalAdd" name="submit"
                                                onclick="saveServiceForProfessional();return false;">SAVE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="btn-action" style="margin: 0px;">
                            <button class="quick-add-button" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasCategory" aria-controls="offcanvasCategory">
                                Client
                            </button>


                            <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasCategory"
                                aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add New Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <span id="messageProfessionalClientAdd"></span>
                                    <form class="row g-3" id="form-add-client" method="POST">
                                        <div class="col-md-12">
                                            <label for="inputClientFullName" class="form-label">Client Full Name</label>
                                            <input type="text" class="form-control form_data_professional"
                                                id="inputClientFullName" name="inputClientFullName"
                                                onchange="clientNameChangeCheck(this);" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputClientEmail" class="form-label">Client Email</label>
                                            <input type="text" class="form-control form_data_professional"
                                                id="inputClientEmail" name="inputClientEmail"
                                                onchange="emailChangeCheck(this);" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputClientMobile" class="form-label">Client Mobile</label>
                                            <input type="text" class="form-control form_data_professional"
                                                id="inputClientMobile" name="inputClientMobile"
                                                onchange="mobileChangeCheck(this);" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputClientDateBirth" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control form_data_professional"
                                                id="inputClientDateBirth" name="inputClientDateBirth" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"
                                                id="clientButtonForProfessionalAdd" name="submit"
                                                onclick="saveClientForProfessional();return false;">SAVE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- ADD CALENDAR WIDGET -->
        <div id="professionalCalendarHome"
            class="d-flex flex-column w-100 align-items-center bg-white rounded-2 bg-box-shadow-calendar mt-3"
            style="max-width: 1070px">
            <?php

            include __DIR__ . '/../../widgets/professional/calendar-homeView.php';
            ?>
        </div>



        <div id="professionalContents" class="container" style="max-width: 1070px;">
            <div class="row">
                <div class="col-sm-6 pe-2 ps-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <?php
                        include __DIR__ . '/../../widgets/professional/widgetInfoACSPreview.php';
                        ?>
                    </div>




                </div>
                <div class="col-sm-6 ps-2 pe-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <h2 class="widget-title">Todays Appointments</h2>
                        <?php
                        include __DIR__ . '/../../widgets/professional/professionalWidget-TodayApp.php';
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasCancelAppointment"
            aria-labelledby="offcanvasCancelLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasCancelLabel">Cancel Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="offcanvas-body-cancel">
                <form class="row g-3" id="form-professional-cancel-appointment" method="POST">
                    <span id="messageCancel"></span>
                    <p>Are you sure you want to cancel your Appointment?</p>

                    <div class="col-12">
                        <button id="appointmentButtonForClientCancel"
                            onclick="cancelAppointmentForProfessional(this); return false;" class="btn btn-primary">Yes
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="offcanvas"
                            aria-label="Close">No</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasEditAppointment"
            aria-labelledby="offcanvasEditLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasEditLabel">Edit My Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="offcanvas-body-edit">
                <span id="messageProfessionalAppEdit"></span>
                <form class="row g-3" id="form-professional-edit-appointment" method="POST">

                </form>
            </div>
        </div>








        <footer class="mt-7 mb-4">
            <p class="m-0 text-secondary text-sm">footer
                <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
            </p>
        </footer>
</section>