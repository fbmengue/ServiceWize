<?php

use controller\AppointmentContr;

session_start();


    //Instancias
    //include __DIR__ . '/../../model/db.classes.php';
   // include __DIR__ . '/../../model/appointment.classe.php';
   // include __DIR__ . '/../../controller/appointment-contr.classes.php';

    //New Service
    $newMyACSPreviewProfessional = new AppointmentContr();

    //Roda erros
    $myASCPreviewProfessional = $newMyACSPreviewProfessional->getASCQuantity();


?>
<a href="?page=admin/adminSetup">
    <div onmouseover="ONprofessionalPreview();" onmouseout="OUTprofessionalPreview();"
        class="w-100 d-flex p-3 justify-content-between align-items-center professional-preview">
        <div class="clients-img">
            <svg width="50" height="50" viewBox="0 0 36 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_128_4346)">
                    <path
                        d="M35 19C35 28.9928 27.3386 37 18 37C8.66142 37 1 28.9928 1 19C1 9.00724 8.66142 1 18 1C27.3386 1 35 9.00724 35 19Z"
                        fill="#EFEFF0" stroke="#AFB1B6" stroke-width="2" />
                    <path
                        d="M23.75 15.0415C23.75 18.4759 21.1254 21.1665 18 21.1665C14.8746 21.1665 12.25 18.4759 12.25 15.0415C12.25 11.6071 14.8746 8.9165 18 8.9165C21.1254 8.9165 23.75 11.6071 23.75 15.0415Z"
                        stroke="#AFB1B6" stroke-width="2" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.76758 30.634C6.8764 26.4767 12.0911 23.75 17.9997 23.75C23.9083 23.75 29.123 26.4767 32.2319 30.634C31.8209 31.1934 31.3809 31.7279 30.9144 32.235C28.2432 28.3737 23.5189 25.75 17.9997 25.75C12.4805 25.75 7.75628 28.3737 5.08506 32.235C4.61854 31.7279 4.17858 31.1934 3.76758 30.634Z"
                        fill="#AFB1B6" />
                </g>
                <defs>
                    <clipPath id="clip0_128_4346">
                        <rect width="36" height="38" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="clients-text">Professionals</div>
        <div class="clients-number"><?php echo $myASCPreviewProfessional[3][0];?></div>

    </div>
</a>
<div id="lineBreak1" class="line-break-ASC"></div>
<a href="#" onclick="adminSetup(this);">
    <div onmouseover="ONclientPreview();" onmouseout="OUTclientPreview();"
        class="w-100 d-flex p-3 justify-content-between align-items-center clients-preview">
        <div class="clients-img">
            <svg width="50" height="50" viewBox="0 0 36 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_128_4346)">
                    <path
                        d="M35 19C35 28.9928 27.3386 37 18 37C8.66142 37 1 28.9928 1 19C1 9.00724 8.66142 1 18 1C27.3386 1 35 9.00724 35 19Z"
                        fill="#EFEFF0" stroke="#AFB1B6" stroke-width="2" />
                    <path
                        d="M23.75 15.0415C23.75 18.4759 21.1254 21.1665 18 21.1665C14.8746 21.1665 12.25 18.4759 12.25 15.0415C12.25 11.6071 14.8746 8.9165 18 8.9165C21.1254 8.9165 23.75 11.6071 23.75 15.0415Z"
                        stroke="#AFB1B6" stroke-width="2" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.76758 30.634C6.8764 26.4767 12.0911 23.75 17.9997 23.75C23.9083 23.75 29.123 26.4767 32.2319 30.634C31.8209 31.1934 31.3809 31.7279 30.9144 32.235C28.2432 28.3737 23.5189 25.75 17.9997 25.75C12.4805 25.75 7.75628 28.3737 5.08506 32.235C4.61854 31.7279 4.17858 31.1934 3.76758 30.634Z"
                        fill="#AFB1B6" />
                </g>
                <defs>
                    <clipPath id="clip0_128_4346">
                        <rect width="36" height="38" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="clients-text">Clients</div>
        <div class="clients-number"><?php echo $myASCPreviewProfessional[2][0];?></div>
    </div>
</a>
<div id="lineBreak2" class="line-break-ASC"></div>
<a href="#" onclick="adminSetup(this);">
    <div onmouseover="ONservicePreview();" onmouseout="OUTservicePreview();"
        class="w-100 d-flex p-3 justify-content-between align-items-center services-preview">
        <div class="services-img">
            <svg width="50" height="50" viewBox="0 0 36 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_128_4346)">
                    <path
                        d="M35 19C35 28.9928 27.3386 37 18 37C8.66142 37 1 28.9928 1 19C1 9.00724 8.66142 1 18 1C27.3386 1 35 9.00724 35 19Z"
                        fill="#EFEFF0" stroke="#AFB1B6" stroke-width="2" />
                    <path
                        d="M23.75 15.0415C23.75 18.4759 21.1254 21.1665 18 21.1665C14.8746 21.1665 12.25 18.4759 12.25 15.0415C12.25 11.6071 14.8746 8.9165 18 8.9165C21.1254 8.9165 23.75 11.6071 23.75 15.0415Z"
                        stroke="#AFB1B6" stroke-width="2" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.76758 30.634C6.8764 26.4767 12.0911 23.75 17.9997 23.75C23.9083 23.75 29.123 26.4767 32.2319 30.634C31.8209 31.1934 31.3809 31.7279 30.9144 32.235C28.2432 28.3737 23.5189 25.75 17.9997 25.75C12.4805 25.75 7.75628 28.3737 5.08506 32.235C4.61854 31.7279 4.17858 31.1934 3.76758 30.634Z"
                        fill="#AFB1B6" />
                </g>
                <defs>
                    <clipPath id="clip0_128_4346">
                        <rect width="36" height="38" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="services-text">Services</div>
        <div class="services-number"><?php echo $myASCPreviewProfessional[0][0];?></div>
    </div>
</a>
<div id="lineBreak3" class="line-break-ASC"></div>
<a href="#" onclick="adminSetup(this);">
    <div onmouseover="ONappPreview();" onmouseout="OUTappPreview();"
        class="w-100 d-flex p-3 justify-content-between align-items-center clients-Preview appointments-preview">
        <div class="appointments-img">
            <svg width="50" height="50" viewBox="0 0 36 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_128_4346)">
                    <path
                        d="M35 19C35 28.9928 27.3386 37 18 37C8.66142 37 1 28.9928 1 19C1 9.00724 8.66142 1 18 1C27.3386 1 35 9.00724 35 19Z"
                        fill="#EFEFF0" stroke="#AFB1B6" stroke-width="2" />
                    <path
                        d="M23.75 15.0415C23.75 18.4759 21.1254 21.1665 18 21.1665C14.8746 21.1665 12.25 18.4759 12.25 15.0415C12.25 11.6071 14.8746 8.9165 18 8.9165C21.1254 8.9165 23.75 11.6071 23.75 15.0415Z"
                        stroke="#AFB1B6" stroke-width="2" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.76758 30.634C6.8764 26.4767 12.0911 23.75 17.9997 23.75C23.9083 23.75 29.123 26.4767 32.2319 30.634C31.8209 31.1934 31.3809 31.7279 30.9144 32.235C28.2432 28.3737 23.5189 25.75 17.9997 25.75C12.4805 25.75 7.75628 28.3737 5.08506 32.235C4.61854 31.7279 4.17858 31.1934 3.76758 30.634Z"
                        fill="#AFB1B6" />
                </g>
                <defs>
                    <clipPath id="clip0_128_4346">
                        <rect width="36" height="38" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="appointments-text">Appointments</div>
        <div class="appointments-number"><?php echo $myASCPreviewProfessional[1][0];?></div>
    </div>
</a>

<?php

?>