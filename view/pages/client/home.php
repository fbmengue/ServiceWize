<?php

session_start();

//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

?>



<section class="d-flex flex-column align-items-center pt-4 pb-8 bg-default main-content">




    <!-- Page Content -->
    <div id="clientContent" class="d-flex flex-column w-100 align-items-center rounded-2 " style="max-width: 1070px">

        <!-- ADD WELCOME WIDGET -->
        <div class="w-100 p-3 bg-widget pt-3 rounded-2">
            <div class="profile d-flex flex-row pt-1 justify-content-between">
                <div class="welcome-container d-flex flex-wrap flex-row justify-content-between">
                    <div class="name w-50 d-flex flex-column">
                        <h2 class="widget-title profile-label">My Profile</h2>
                    </div>

                    <div class="balance w-50 flex-column">


                    </div>
                    <div class="info-list d-flex w-100 flex-row justify-content-between">
                        <?php
                            include __DIR__ . '/../../widgets/user/userWidget-Profile.php';
                        ?>
                    </div>
                </div>
                <div class="quick-add-menu">
                    <h2 class="widget-title" translate="">Next Appointments</h2>
                    <?php
                        include __DIR__ . '/../../widgets/client/clientWidget-NextApp.php';
                    ?>
                </div>
            </div>
        </div>



        <div class="container" style="max-width: 1070px;">
            <div class="row">
                <div class="left-col col-sm-6 pe-2 ps-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <?php
                        include __DIR__ . '/../../widgets/client/clientWidget-CountApp.php';
                        ?>
                    </div>
                    <div class="col-sm-12 d-flex flex-column bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <h2 class="widget-title" translate="">All Future Appointments</h2>
                        <?php
                        include __DIR__ . '/../../widgets/client/clientWidget-FuturesApp.php';
                        ?>
                    </div>



                </div>
                <div class="right-col col-sm-6 ps-2 pe-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <h2 class="widget-title" translate="">All Past Appointments</h2>
                        <?php
                        include __DIR__ . '/../../widgets/client/clientWidget-PastApp.php';
                        ?>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="quick-bottom-add">
        <div class="client-new-appointment">
            <div class="container">
                <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAppoint"
                    aria-controls="offcanvasAppoint">
                    <span>+</span>
                </button>
            </div>
        </div>



        <div class="offcanvas form-popup offcanvas-start" tabindex="-1" id="offcanvasAppoint"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add New Appointment</h5>
                <button type="button" onclick="closeForm();" class="btn-close" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <span id="message"></span>
                <form class="row g-3" id="form-add-appointment" method="POST">

                    <div class="col-md-12">
                        <?php include __DIR__ . '/../../includes/professional/professionalListForClient.inc.php';?>
                    </div>

                    <div class="row g-3 mt-0 ps-3 pe-0" id="divInputAppointmentService">

                    </div>



                    <div class="col-md-12">
                        <label for="inputAppointmentDate" class="form-label">Date</label>
                        <input type="date" class="form-control form_data" id="inputAppointmentDate"
                            name="inputAppointmentDate" onchange="showHoursAvailableForClient(); return false;"
                            required>
                    </div>

                    <div class="col-md-12" id="divInputAppointmentTime">


                    </div>


                    <div class="col-12">
                        <button id="appointmentButtonForClientAdd" class="btn btn-primary"
                            onclick="saveAppointmentForClient(); return false;">Add
                            Appointment</button>


                    </div>
                </form>
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
            <form class="row g-3" id="form-cancel-appointment" method="POST">
                <span id="messageCancel"></span>
                <p>Are you sure you want to cancel your Appointment?</p>

                <div class="col-12">
                    <button id="appointmentButtonForClientCancel"
                        onclick="cancelAppointmentForClient(this); return false;" class="btn btn-primary">Yes
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
            <span id="messageAdminAppEdit"></span>
            <form class="row g-3" id="form-edit-appointment" method="POST">


            </form>
        </div>
    </div>



    <footer class="mt-7 mb-4">
        <p class="m-0 text-secondary text-sm">footer
            <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
        </p>
    </footer>
</section>