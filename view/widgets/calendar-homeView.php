<?php

namespace widgets;

use controller\AppointmentContr;

//SET timezone
date_default_timezone_set("Europe/Lisbon");
//setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

if (isset($_GET['texto'])) {
    $CurrentDay = $_GET['texto'];
    $CurrentDayPrev = $_GET['texto'] - 7;
    $CurrentDayNext = $_GET['texto'] + 7;
} else {
    $CurrentDay = 0;
    $CurrentDayPrev =  -7;
    $CurrentDayNext = +7;
}

//If date empty set date today
if (empty($_GET['date'])) {
    $_GET["date"] = date('Y-m-d', time());
}





    $hoje = date('Y-m-d', time());

    $weekWidget = array(
        // array(
        //     "dayInt" => date('d', strtotime("today " . strval($CurrentDay - 4) . " day")),
        //     "dayText" => date('D', strtotime("today " . strval($CurrentDay - 4) . " day")),
        //     "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay - 4) . " day")),
        // ),
        array(
            "dayInt" => date('d', strtotime("today " . strval($CurrentDay - 3) . " day")),
            "dayText" => date('D', strtotime("today " . strval($CurrentDay - 3) . " day")),
            "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay - 3) . " day")),
        ),
        array(
            "dayInt" => date('d', strtotime("today " . strval($CurrentDay - 2) . " day")),
            "dayText" => date('D', strtotime("today " . strval($CurrentDay - 2) . " day")),
            "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay - 2) . " day")),
        ),
        array(
            "dayInt" => date('d', strtotime("today " . strval($CurrentDay - 1) . " day")),
            "dayText" => date('D', strtotime("today " . strval($CurrentDay - 1) . " day")),
            "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay - 1) . " day")),
        ),
        array(
            "dayInt" => date('d', strtotime("today " . strval($CurrentDay) . " day")),
            "dayText" => date('D', strtotime("today " . strval($CurrentDay) . " day")),
            "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay) . " day")),
        ),
        array(
            "dayInt" => date('d', strtotime("today " . strval($CurrentDay + 1) . " day")),
            "dayText" => date('D', strtotime("today " . strval($CurrentDay + 1) . " day")),
            "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay + 1) . " day")),
        ),
        array(
            "dayInt" => date('d', strtotime("today " . strval($CurrentDay + 2) . " day")),
            "dayText" => date('D', strtotime("today " . strval($CurrentDay + 2) . " day")),
            "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay + 2) . " day")),
        ),
        array(
            "dayInt" => date('d', strtotime("today " . strval($CurrentDay + 3) . " day")),
            "dayText" => date('D', strtotime("today " . strval($CurrentDay + 3) . " day")),
            "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay + 3) . " day")),
        ),
        // array(
        //     "dayInt" => date('d', strtotime("today " . strval($CurrentDay + 4) . " day")),
        //     "dayText" => date('D', strtotime("today " . strval($CurrentDay + 4) . " day")),
        //     "fullDate" => date('Y-m-d', strtotime("today " . strval($CurrentDay + 4) . " day")),
        // ),
     );
     $time = strtotime($_GET['date']);
     $dateFormatForView = date("d-m-Y", $time);



     //Instancias
    //include __DIR__ . '/../../model/db.classes.php';
    include __DIR__ . '/../../model/appointment.classe.php';
    include __DIR__ . '/../../controller/appointment-contr.classes.php';


    //New appointment list by date
    $servicePerDayListHome = new AppointmentContr();

    //Roda erros
    $appointmentPerDayListHome = $servicePerDayListHome->getAppointmentsPerDayList();
    // print_r("<pre>");
    // print_r($appointmentPerDayList);
    // print_r("</pre>");
    // exit;


    ?>
<div class="container mobile-container-calendar">
    <div class="navbar-week-header">
        <div class="next-prev d-flex justify-content-between">
            <div class="prev-week d-flex flex-column justify-content-center">
                <a href="?page=home&date=<?php echo $_GET['date'] ?>&texto=<?php echo $CurrentDayPrev; ?>">&lt;
                </a>
            </div>
            <a href="?page=home&date=<?php echo $hoje ?>&texto=0">HOJE</a>
            <div><?php echo $dateFormatForView?></div>
            <div class="next-week d-flex flex-column justify-content-center">
                <a
                    href="?page=home&date=<?php echo $_GET['date'] ?>&texto=<?php echo $CurrentDayNext; ?>">&gt;</a>
            </div>
        </div>

    </div>
    <div class="navbar-days d-flex flex-row text-center justify-content-between">

        <?php

        foreach ($weekWidget as $weekWidget) {
            $itemIDHome = array_search($weekWidget['fullDate'], array_column($appointmentPerDayListHome, 'appointmentDate'));
            if ($itemIDHome !== false) {
                ?>

        <a href="?page=calendar/dayView&date=<?php echo $weekWidget['fullDate'];?>&texto=<?php echo $CurrentDay ?>"
            class="<?php  if ($weekWidget['fullDate'] == $_GET['date'] && $weekWidget['fullDate'] < $hoje) {
                                    echo "pass-day-selected";
                   } elseif ($weekWidget['fullDate'] == $_GET['date']) {
                       echo "today";
                   } elseif ($weekWidget['fullDate'] >= $hoje) {
                       echo "nav-day nav-day-future";
                   } else {
                       echo "nav-day nav-day-pass";
                   }; ?>">
            <div class="calendar-text" style="padding-bottom: 10px;"><?php echo $weekWidget['dayText'];?></div>
            <div class="calendar-number"> <?php echo $weekWidget['dayInt'];?>
                <span
                    class="calendar-service-per-day"><?php echo $appointmentPerDayListHome[$itemIDHome]['servicesPerDay'];?></span>
            </div>
        </a> <?php
            } else {
                ?>

        <a href="?page=calendar/dayView&date=<?php echo $weekWidget['fullDate'];?>&texto=<?php echo $CurrentDay ?>"
            class="<?php  if ($weekWidget['fullDate'] == $_GET['date'] && $weekWidget['fullDate'] < $hoje) {
                                    echo "pass-day-selected";
                   } elseif ($weekWidget['fullDate'] == $_GET['date']) {
                       echo "today";
                   } elseif ($weekWidget['fullDate'] >= $hoje) {
                       echo "nav-day nav-day-future";
                   } else {
                       echo "nav-day nav-day-pass";
                   }; ?>">
            <div class="calendar-text" style="padding-bottom: 10px;"><?php echo $weekWidget['dayText'];?></div>
            <div class="calendar-number"> <?php echo $weekWidget['dayInt'];?>
            </div>
        </a> <?php
            }
        }
        ?>

    </div>
</div>
