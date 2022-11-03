<?php

session_start();

//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

include __DIR__ . '/../../../model/db.classes.php';
include __DIR__ . '/../../../model/user.classe.php';
include __DIR__ . '/../../../model/service.classe.php';
include __DIR__ . '/../../../model/professional.classe.php';
include __DIR__ . '/../../../controller/service-contr.classes.php';
include __DIR__ . '/../../../controller/professional-contr.classes.php';
include __DIR__ . '/../../../controller/user-contr.classes.php';


?>



<section class="d-flex flex-column align-items-center pt-4 pb-8 bg-default main-content">



    <span id="messageAccount"></span>
    <!-- ADD WELCOME WIDGET -->
    <div class="container" id="accountContent" style="max-width: 1070px;">

        <div class="row">
            <div class="left-col col-sm-6 pe-2 ps-0">

                <div class="col-sm-12 d-flex flex-column bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h2 class="widget-title mb-4">My Profile</h2>
                    <?php
                        include __DIR__ . '/../../widgets/user/userWidget-Account.php';
                    ?>
                </div>



            </div>
            <div class="right-col col-sm-6 ps-2 pe-0">
                <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                    <h2 class="widget-title mb-4">My Password</h2>
                    <?php
                       include __DIR__ . '/../../widgets/user/userWidget-Password.php';
                    ?>
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
                            name="inputAppointmentDate" onchange="showHoursAvailable(); return false;" required>
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



        <footer class="mt-7 mb-4">
            <p class="m-0 text-secondary text-sm">footer
                <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
            </p>
        </footer>
</section>