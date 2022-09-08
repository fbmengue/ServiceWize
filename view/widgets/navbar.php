<?php

  session_start();
?>

<!-- NAV MENU FOR TABLE AND WEB VIEW -->
<header class="navbar navbar-expand-lg navbar-dark bd-navbar sticky-top bg-green-dark fw-semibold">
    <nav class="container flex-wrap flex-lg-nowrap ">
        <div class="div-logo d-flex">
            <a class="navbar-brand" href="/servicewise/ServiceWize" style="padding: 0px;margin: 0px;">
                <svg width="170px" height="50" viewBox="0 0 349.7843137254902 68.62745098039215" class="css-1j8o68f">
                    <defs id="SvgjsDefs1208"></defs>
                    <g id="SvgjsG1209" featurekey="Df7oLJ-0"
                        transform="matrix(0.13403799019607843,0,0,0.13403799019607843,0,0)" fill="#ffffff">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M512,256c0,141.375-114.625,256-256,256c106.031,0,192-85.969,192-192s-85.969-192-192-192S64,213.969,64,320  s85.969,192,192,192C114.625,512,0,397.375,0,256S114.625,0,256,0S512,114.625,512,256z M256,256c-70.688,0-128,57.313-128,128  c0,66.281,50.563,120.156,115.094,126.688C213.938,504.719,192,478.938,192,448c0-35.344,28.656-64,64-64s64,28.656,64,64  c0,30.938-21.938,56.719-51.094,62.688C333.438,504.156,384,450.281,384,384C384,313.313,326.688,256,256,256z">
                        </path>
                    </g>
                    <g id="SvgjsG1210" featurekey="Ua4uQk-0"
                        transform="matrix(2.148396123268417,0,0,2.148396123268417,87.49612209905105,6.625238862680172)"
                        fill="#ffffff">
                        <path
                            d="M5.86 5.76 c2.52 0 4.06 1.56 4.82 2.88 l-2.36 1.42 c-0.78 -1 -1.46 -1.46 -2.46 -1.46 c-0.86 0 -1.5 0.5 -1.5 1.2 c0 0.72 0.4 1.08 1.4 1.42 l0.94 0.34 c3.26 1.14 4.38 2.58 4.38 4.44 c0 2.92 -2.76 4.3 -5.16 4.3 c-2.56 0 -4.52 -1.52 -5.22 -3.46 l2.46 -1.32 c0.5 0.9 1.24 1.88 2.76 1.88 c1.04 0 1.82 -0.42 1.82 -1.36 c0 -0.86 -0.48 -1.26 -1.98 -1.82 l-0.8 -0.28 c-2.06 -0.74 -3.8 -1.72 -3.8 -4.28 c0 -2.28 2.16 -3.9 4.7 -3.9 z M17.96 9.42 c2.36 0 5.66 1.78 5 6.48 l-7.26 0 c0.36 1.08 1.3 1.64 2.56 1.64 c1.28 0 1.68 -0.28 2.4 -0.58 l1.74 1.68 c-0.92 0.9 -2.16 1.56 -4.26 1.56 c-2.58 0 -5.66 -1.78 -5.66 -5.36 c0 -3.64 3.12 -5.42 5.48 -5.42 z M17.96 12.120000000000001 c-0.9 0 -1.82 0.52 -2.22 1.56 l4.42 0 c-0.32 -1.04 -1.3 -1.56 -2.2 -1.56 z M31.44 9.44 c0.28 0 0.56 0 0.82 0.06 l0 3.02 c-0.24 -0.06 -0.52 -0.06 -0.72 -0.06 c-1.92 0 -3.46 1.38 -3.62 3.3 l0 4.24 l-3.16 0 l0 -10.4 l3.16 0 l0 2.54 c0.48 -1.56 1.68 -2.7 3.52 -2.7 z M45.46 9.56 l-4.66 10.44 l-2.78 0 l-4.66 -10.44 l3.14 0 l2.92 6.68 l2.9 -6.68 l3.14 0 z M50.14 5.859999999999999 l0 2.66 l-3.16 0 l0 -2.66 l3.16 0 z M50.14 9.6 l0 10.4 l-3.16 0 l0 -10.4 l3.16 0 z M57.300000000000004 9.42 c1.9 0 3.5 0.8 4.48 2.48 l-2.4 1.14 c-0.52 -0.44 -0.94 -0.84 -2.04 -0.84 c-1.2 0 -2.42 0.92 -2.42 2.62 c0 1.68 1.22 2.56 2.42 2.56 c1.1 0 1.52 -0.36 2.04 -0.8 l2.44 1.14 c-1.02 1.68 -2.58 2.44 -4.52 2.44 c-2.32 0 -5.44 -1.66 -5.44 -5.34 c0 -3.62 3.12 -5.4 5.44 -5.4 z M68.02000000000001 9.42 c2.36 0 5.66 1.78 5 6.48 l-7.26 0 c0.36 1.08 1.3 1.64 2.56 1.64 c1.28 0 1.68 -0.28 2.4 -0.58 l1.74 1.68 c-0.92 0.9 -2.16 1.56 -4.26 1.56 c-2.58 0 -5.66 -1.78 -5.66 -5.36 c0 -3.64 3.12 -5.42 5.48 -5.42 z M68.02000000000001 12.120000000000001 c-0.9 0 -1.82 0.52 -2.22 1.56 l4.42 0 c-0.32 -1.04 -1.3 -1.56 -2.2 -1.56 z M94.58000000000001 6 l-4.62 14 l-2.34 0 l-3.14 -8.36 l-3.12 8.36 l-2.34 0 l-4.62 -14 l3.4 0 l2.52 7.76 l2.88 -7.76 l2.56 0 l2.9 7.76 l2.52 -7.76 l3.4 0 z M99.36000000000001 5.859999999999999 l0 2.66 l-3.16 0 l0 -2.66 l3.16 0 z M99.36000000000001 9.6 l0 10.4 l-3.16 0 l0 -10.4 l3.16 0 z M110.92000000000002 9.6 l-5 7.64 l4.66 0 l0 2.76 l-9.7 0 l5 -7.64 l-4.54 0 l0 -2.76 l9.58 0 z M117.00000000000003 9.42 c2.36 0 5.66 1.78 5 6.48 l-7.26 0 c0.36 1.08 1.3 1.64 2.56 1.64 c1.28 0 1.68 -0.28 2.4 -0.58 l1.74 1.68 c-0.92 0.9 -2.16 1.56 -4.26 1.56 c-2.58 0 -5.66 -1.78 -5.66 -5.36 c0 -3.64 3.12 -5.42 5.48 -5.42 z M117.00000000000003 12.120000000000001 c-0.9 0 -1.82 0.52 -2.22 1.56 l4.42 0 c-0.32 -1.04 -1.3 -1.56 -2.2 -1.56 z">
                        </path>
                    </g>
                </svg>
            </a>
            
        </div>
        <div class="div-menu d-flex">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homeCasoJS.php">DASHBOARD</a>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            SCHEDULE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Dia</a></li>
                            <li><a class="dropdown-item" href="#">Semana</a></li>
                            <li><a class="dropdown-item" href="#">Mes</a></li>
                            <li><a class="dropdown-item" href="#">Avançado</a></li>
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="portfolioCasoJS.php">REPORTS</a>
                    </li>
                    <?php
                    if ($_SESSION["userType"] == "client") {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="adminPage.php">SERVICES</a>
                    </li>
                        <?php
                    } else {
                    }
                    ?>

                </ul>
            </div>
        </div>
        <div class="d-flex flex-ro nav-user-settings">
            <?php
            if (isset($_SESSION["userID"])) {
                ?>
            <div class="w-100 d-flex justify-content-end">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="display:contents;">

                   
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle p-0" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img alt="Avatar-missing" src="assets/images/avatar-missing-white.svg" width="37">
                        </a>
                        <ul class="dropdown-menu user-info-menu" aria-labelledby="navbarDropdown">
                            <div class="user-info text-center py-2" zze-mark="current">
                                <a href="#" class="user-avatar text-decoration-none">
                                    <div class="image">
                                        <img alt="Avatar-missing" src="assets/images/avatar-missing.svg" width="50">
                                    </div>
                                    <div class="details m-2 fw-semibold">
                                        <span><?php echo $_SESSION["userName"] . " "
                                        . $_SESSION["userLastName"];?></span>
                                    </div>
                                </a>
                            </div>
                            <div class="text-center p-2" zze-mark="current">
                                <li><a class="dropdown-item" href="#">My Account</a></li>
                                <li><a class="dropdown-item" href="view/includes/logout.inc.php">Sign Out</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
                    <?php
            }
            ?>
            </div>
        </div>
    </nav>
</header>



<!-- NAV MENU FOR MOBILE VIEW -->

<nav class="w-100 navbar-mobile flex-row justify-content-around py-3">

    <a href="#" class="navItem-selected">
        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7.74058 21.9022V18.3349C7.74058 17.4242 8.4842 16.686 9.40151 16.686H12.7547C13.1952 16.686 13.6177 16.8597 13.9292 17.169C14.2407 17.4782 14.4156 17.8976 14.4156 18.3349V21.9022C14.4129 22.2808 14.5624 22.6449 14.8311 22.9135C15.0998 23.1822 15.4654 23.3333 15.8468 23.3333H18.1345C19.2029 23.3361 20.2285 22.9166 20.985 22.1676C21.7415 21.4186 22.1667 20.4015 22.1667 19.3408V9.178C22.1667 8.3212 21.7841 7.50848 21.1221 6.95878L13.3397 0.788514C11.9859 -0.293345 10.0463 -0.258414 8.73296 0.871475L1.12818 6.95878C0.434864 7.49228 0.0204777 8.30741 0 9.178V19.3304C0 21.5412 1.80528 23.3333 4.0322 23.3333H6.26767C7.05976 23.3333 7.7035 22.6989 7.70924 21.9126L7.74058 21.9022Z"
                fill="#01261C" />
        </svg>
    </a>

    <a href="#" class="navItem">
        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M11.58 11.0808L10.3585 14.9856L14.2622 13.7629L15.4848 9.85809L11.58 11.0808ZM9.02384 17.1941C8.79517 17.1941 8.57117 17.1043 8.40434 16.9386C8.17451 16.7076 8.09051 16.3681 8.18851 16.0589L10.047 10.1218C10.1322 9.84642 10.3468 9.63292 10.6198 9.54776L16.557 7.68926C16.8685 7.59009 17.2068 7.67526 17.4378 7.90509C17.6677 8.13609 17.7517 8.47559 17.6537 8.78476L15.7963 14.7219C15.7112 14.9961 15.4953 15.2108 15.2223 15.2959L9.28517 17.1544C9.19884 17.1813 9.11017 17.1941 9.02384 17.1941V17.1941Z" />
            <mask id="mask0_219_3443" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="26"
                height="25">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.833252 0.333496H25.0087V24.5088H0.833252V0.333496Z"
                    fill="white" />
            </mask>
            <g mask="url(#mask0_219_3443)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12.9208 2.0835C7.22051 2.0835 2.58301 6.72216 2.58301 12.4213C2.58301 18.1217 7.22051 22.7592 12.9208 22.7592C18.6212 22.7592 23.2587 18.1217 23.2587 12.4213C23.2587 6.72216 18.6212 2.0835 12.9208 2.0835M12.9208 24.5092C6.25567 24.5092 0.833008 19.0865 0.833008 12.4213C0.833008 5.75616 6.25567 0.333496 12.9208 0.333496C19.586 0.333496 25.0087 5.75616 25.0087 12.4213C25.0087 19.0865 19.586 24.5092 12.9208 24.5092" />
            </g>
        </svg>
    </a>

    <a href="#" class="navItem-add">
        <svg width="48" height="25" viewBox="0 0 48 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="48" height="30" rx="10" fill="#01261C" />
            <path
                d="M29.0001 15.8332H24.8334V19.9998C24.8334 20.4582 24.4584 20.8332 24.0001 20.8332C23.5417 20.8332 23.1667 20.4582 23.1667 19.9998V15.8332H19.0001C18.5417 15.8332 18.1667 15.4582 18.1667 14.9998C18.1667 14.5415 18.5417 14.1665 19.0001 14.1665H23.1667V9.99984C23.1667 9.5415 23.5417 9.1665 24.0001 9.1665C24.4584 9.1665 24.8334 9.5415 24.8334 9.99984V14.1665H29.0001C29.4584 14.1665 29.8334 14.5415 29.8334 14.9998C29.8334 15.4582 29.4584 15.8332 29.0001 15.8332Z"
                fill="white" />
        </svg>
    </a>

    <a href="#" class="navItem">
        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M1.875 8.5C1.875 5.13324 4.63324 2.375 8 2.375H15C18.3668 2.375 21.125 5.13324 21.125 8.5V14.625H13.8333C13.3501 14.625 12.9583 15.0168 12.9583 15.5C12.9583 16.3001 12.3001 16.9583 11.5 16.9583C10.6999 16.9583 10.0417 16.3001 10.0417 15.5C10.0417 15.0168 9.6499 14.625 9.16667 14.625H1.875V8.5ZM0.125 15.5C0.125 19.8332 3.66675 23.375 8 23.375H15C19.3332 23.375 22.875 19.8332 22.875 15.5V8.5C22.875 4.16675 19.3332 0.625 15 0.625H8C3.66675 0.625 0.125 4.16675 0.125 8.5V15.5ZM1.93787 16.375H8.41336C8.79598 17.7189 10.0365 18.7083 11.5 18.7083C12.9635 18.7083 14.204 17.7189 14.5867 16.375H21.0621C20.6338 19.3318 18.0698 21.625 15 21.625H8C4.93014 21.625 2.36619 19.3318 1.93787 16.375Z"
                fill="#01261C" />
        </svg>
    </a>

    <a href="#" class="navItem" onclick="openNav()">

        <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="mask0_219_3537" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="14" width="19"
                height="10">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.166748 14.9121H18.6466V23.5151H0.166748V14.9121Z"
                    fill="white" />
            </mask>
            <g mask="url(#mask0_219_3537)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M9.40791 16.6621C4.43675 16.6621 1.91675 17.5161 1.91675 19.2019C1.91675 20.9029 4.43675 21.7651 9.40791 21.7651C14.3779 21.7651 16.8967 20.9111 16.8967 19.2253C16.8967 17.5243 14.3779 16.6621 9.40791 16.6621M9.40791 23.5151C7.12241 23.5151 0.166748 23.5151 0.166748 19.2019C0.166748 15.3566 5.44125 14.9121 9.40791 14.9121C11.6934 14.9121 18.6467 14.9121 18.6467 19.2253C18.6467 23.0706 13.3734 23.5151 9.40791 23.5151"
                    fill="#01261C" />
            </g>
            <mask id="mask1_219_3537" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="3" y="0" width="13"
                height="13">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.21167 0.333496H15.6017V12.7219H3.21167V0.333496Z"
                    fill="white" />
            </mask>
            <g mask="url(#mask1_219_3537)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M9.40787 1.99901C6.91004 1.99901 4.87771 4.03017 4.87771 6.52801C4.86954 9.01767 6.88671 11.0477 9.37404 11.057L9.40787 11.89V11.057C11.9045 11.057 13.9357 9.02467 13.9357 6.52801C13.9357 4.03017 11.9045 1.99901 9.40787 1.99901M9.40787 12.7218H9.37054C5.96154 12.7113 3.20004 9.93117 3.21171 6.52451C3.21171 3.11201 5.99071 0.333008 9.40787 0.333008C12.8239 0.333008 15.6017 3.11201 15.6017 6.52801C15.6017 9.94401 12.8239 12.7218 9.40787 12.7218"
                    fill="#01261C" />
            </g>
        </svg>       
    </a>



</nav>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="dropdown-item" href="#">My Account</a>
    <a class="dropdown-item" href="view/includes/logout.inc.php">Sign Out</a>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";

}
</script>
