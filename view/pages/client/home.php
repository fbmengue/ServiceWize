<?php

session_start();

//HEADER / NAVBAR
include __DIR__ . '/../../widgets/navbar.php';

?>



<section class="d-flex flex-column align-items-center pt-4 pb-8 bg-default main-content">




    <!-- ADD WELCOME WIDGET -->
    <div class="d-flex flex-column w-100 align-items-center rounded-2 " style="max-width: 1070px">
        <div class="w-100 p-3 bg-widget pt-3 rounded-2">
            <div class="profile d-flex flex-row pt-1 justify-content-between">
                <div class="welcome-container d-flex flex-wrap flex-row justify-content-between">
                    <div class="name w-50 d-flex flex-column">
                        <h2 class="widget-title profile-label">My Profile</h2>
                    </div>
                    
                    <div class="balance w-50 flex-column">
                        Welcome
                  
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



        <div class="quick-bottom-add">
            <div class="client-new-appointment">
                <div class="container">
                    <button type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasAppoint" aria-controls="offcanvasAppoint">
                        <span>+</span>
                    </button>
                </div>
            </div>
            


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
                            <?php include __DIR__ . '/../../includes/professional/professionalListForClient.inc.php';?>
                        </div>
    
                        <?php include __DIR__ . '/../../includes/service/serviceListForClient.inc.php'; ?>
                            
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
                        

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" form="form-add-appointment"
                                name="submit"
                                formaction="view/includes/client/appointment.inc.php">Add Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <footer class="mt-7 mb-4">
            <p class="m-0 text-secondary text-sm">footer
                <a class="text-1DB968 fw-semibold" href="?page=login">pensar em ffooter</a>
            </p>
        </footer>
</section>
