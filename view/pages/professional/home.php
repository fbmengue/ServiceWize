<?php

session_start();

//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

?>



<section class="d-flex flex-column align-items-center pt-4 pb-8 bg-default main-content">




    <!-- ADD WELCOME WIDGET -->
    <div class="d-flex flex-column w-100 align-items-center rounded-2 " style="max-width: 1070px">
        <div class="w-100 p-3 bg-widget pt-3">
            <div class="profile d-flex flex-row pt-1 justify-content-between">
                <div class="welcome-container d-flex flex-wrap flex-row justify-content-between">
                    <div class="name w-50 d-flex flex-column">
                        <p class="title-label">Welcome back,</p>
                        <p class="name-label"><?php echo $_SESSION["userFullName"]?> </p>
                    </div>
                    <div class="balance w-50 flex-column">
                        <p class="title-label" translate="">overall balance</p>
                        <p class="title-label">€ <strong class="balance-value"></strong>
                    </div>
                    <div class="info-list d-flex w-100 flex-row justify-content-between">
                        <div class="info-label amount">
                            <p class="title" translate="">monthly earning</p>
                            <p class="amount earning">€ 189,30</p>
                        </div>
                        <div class="info-label amount">
                            <p class="title" translate="">monthly services</p>
                            <p class="amount expense">€ -1.367,20</p>
                        </div><a class="info-label report" href="">
                            <i class="icon-report"></i>
                            <p translate="" class="">see reports</p>
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
                                    <form class="row g-3" id="form-add-appointment" method="POST">
                                        <div class="col-md-12">
                                            <?php include __DIR__ . '/../../includes/client/clientList.inc.php'; ?>
                                        </div>

                                        <div class="col-md-12">
                                            <?php include __DIR__ . '/../../includes/service/myServiceList.inc.php'; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputAppointmentDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="inputAppointmentDate"
                                                name="inputAppointmentDate" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputAppointmentTime" class="form-label">Time</label>
                                            <select class="form-select" id="inputAppointmentTime"
                                                name="inputAppointmentTime" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="09:00">09:00</option>
                                                <option value="10:00">10:00</option>
                                                <option value="11:00">11:00</option>
                                                <option value="13:00">13:00</option>
                                                <option value="16:00">16:00</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <?php include __DIR__ . '/../includes/professional/professionalList.inc.php';?>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" form="form-add-appointment"
                                                name="submit"
                                                formaction="view/includes/appointment/clientAndAppointment.inc.php">Add
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
                                    <form class="row g-3" id="form-add-service" method="POST">
                                        <div class="col-12">
                                            <label for="inputServiceName" class="form-label">Service Name</label>
                                            <input type="text" class="form-control" id="inputServiceName"
                                                name="inputServiceName" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputServiceDuration" class="form-label">Duration</label>
                                            <input type="text" class="form-control" id="inputServiceDuration"
                                                name="inputServiceDuration" data-mask="00/00/0000"
                                                data-mask-reverse="true" required />

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPrice" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="inputServicePrice"
                                                name="inputServicePrice" value="" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" form="form-add-service"
                                                name="submit"
                                                formaction="view/includes/service/service.inc.php">SUBMIT</button>
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
                                    <form class="row g-3" id="form-add-client" method="POST">
                                        <div class="col-md-12">
                                            <label for="inputClientFullName" class="form-label">Client Full Name</label>
                                            <input type="text" class="form-control" id="inputClientFullName"
                                                name="inputClientFullName" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputClientEmail" class="form-label">Client Email</label>
                                            <input type="text" class="form-control" id="inputClientEmail"
                                                name="inputClientEmail" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputClientMobile" class="form-label">Client Mobile</label>
                                            <input type="text" class="form-control" id="inputClientMobile"
                                                name="inputClientMobile" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputClientDateBirth" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="inputClientDateBirth"
                                                name="inputClientDateBirth" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" form="form-add-client"
                                                name="submit"
                                                formaction="view/includes/client/client.inc.php">SUBMIT</button>
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
        <div class="d-flex flex-column w-100 align-items-center bg-white rounded-2 bg-box-shadow-calendar mt-3"
            style="max-width: 1070px">
            <?php

            include __DIR__ . '/../../widgets/professional/calendar-homeView.php';
            ?>
        </div>



        <div class="container" style="max-width: 1070px;">
            <div class="row">
                <div class="col-sm-6 pe-2 ps-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <?php
                        include __DIR__ . '/../../widgets/professional/widgetInfoACSPreview.php';
                        ?>
                    </div>
                    <div class="col-sm-12 d-flex flex-column bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <h1>home</h1>
                    </div>
                    


                </div>
                <div class="col-sm-6 ps-2 ps-0">
                    <div class="col-sm-12 bg-widget mt-3 p-3 rounded-3 bg-box-shadow-thin">
                        <h1>home<h1>home</h1>
                        </h1>
                        <p>AECTEP - ASDASDIh</p>
                    </div>
                   
                </div>
            </div>
        </div>








        <footer class="mt-7 mb-4">
            <p class="m-0 text-secondary text-sm">footer
                <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
            </p>
        </footer>
</section>
