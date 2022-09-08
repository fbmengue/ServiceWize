<?php
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


//GET prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    $ym = $_GET['Y-m'];
}

//CHECK format
$timestamp = strtotime($ym, '-01');
if ($timestamp === false) {
    $timestamp = time();
}

//Today
$today = date('Y-m-d', time());

//FOR h3 title
$html_title = date('Y / m', $timestamp);

//CREATE prev & next month link ..... mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

//Number of days in the month
$day_count = date('t', $timestamp);


//0:Sunday 1:Monday 2:Tues...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

//CREATE Calendar
$weeks = array();
$week = '';

//ADD empty cell
//$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {
    $date = $ym . '-' . $day;
    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    // END of the week or month
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            //Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
       // $weeks[] = '<tr>'.$week.'</tr>';


        //Prepare for new week
        $week = '';
    }
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
    ?>
<div class="container mobile-container-calendar">
    <div class="navbar-week-header">
        <div class="next-prev d-flex justify-content-between">
            <div class="prev-week d-flex flex-column justify-content-center">
                <a href="?texto=<?php echo $CurrentDayPrev; ?>">&lt; </a>
            </div>
            <a href="?texto=0">HOJE</a>
            <div class="next-week d-flex flex-column justify-content-center">
                <a href="?texto=<?php echo $CurrentDayNext; ?>">&gt;</a>
            </div>
        </div>

    </div>
    <div class="navbar-days d-flex flex-row text-center justify-content-between">
        
        <?php
        foreach ($weekWidget as $weekWidget) {
            ?>

        <a href="#" class="<?php  echo ($weekWidget['fullDate'] == $hoje) ? "today" : "nav-day"; ?>">
            <div class="calendar-text" style="padding-bottom: 10px;"><?php echo $weekWidget['dayText'];?></div>
            <div class="calendar-number"> <?php echo $weekWidget['dayInt'];?></div>
        </a>

            <?php
        }
        ?>
        
    </div>
</div>




















<?php


// $dayOne = date('l - d/m/Y', strtotime("sunday ".$CurrentSemana." week"));
// $dayTwo = date('l - d/m/Y', strtotime("monday ".$CurrentSemana." week"));
// $dayThree = date('l - d/m/Y', strtotime("tuesday ".$CurrentSemana." week"));
// $dayFour = date('l - d/m/Y', strtotime("wednesday ".$CurrentSemana." week"));
// $dayFive = date('l - d/m/Y', strtotime("thursday ".$CurrentSemana." week"));
// $daySix = date('l - d/m/Y', strtotime("friday ".$CurrentSemana." week"));
// $daySeven = date('l - d/m/Y', strtotime("saturday ".$CurrentSemana." week"));
// echo "First day of this week: ", $dayOne;

// echo "Second day of this week: ", $dayTwo;

// echo "Third day of this week: ", $dayThree;

// echo "Third day of this week: ", $dayFour;

// echo "Third day of this week: ", $dayFive;

// echo "Third day of this week: ", $daySix;

// echo "Third day of this week: ", $daySeven;



?>
