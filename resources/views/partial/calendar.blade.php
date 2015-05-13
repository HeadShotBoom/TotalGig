<?php

$date =time () ;

//This puts the day, month, and year in seperate variables

$day = date('d', $date) ;

$month = date('m', $date);
if(isset($_GET['year'])){
    $year = $_GET['year'];
}else {
    $year = date('Y', $date);
}
$splityear = str_split($year, 2);
$shortyear = $splityear[1];

if(isset($_GET['month'])) {
    if($_GET['month']<13 && $_GET['month']>0) {
        $month = $_GET['month'];
    }elseif($_GET['month']==0){
        $month = 12;
        $year = $year-1;
    }elseif($_GET['month'] == 13){
        $month = 1;
        $year = $year+1;
    }
}




//Here we generate the first day of the month

$first_day = mktime(0,0,0,$month, 1, $year) ;



//This gets us the month name

$title = date('F', $first_day) ;

//Here we find out what day of the week the first day of the month falls on
$day_of_week = date('D', $first_day) ;



//Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero

switch($day_of_week){

    case "Sun": $blank = 0; break;

    case "Mon": $blank = 1; break;

    case "Tue": $blank = 2; break;

    case "Wed": $blank = 3; break;

    case "Thu": $blank = 4; break;

    case "Fri": $blank = 5; break;

    case "Sat": $blank = 6; break;

}

//We then determine how many days are in the current month

$days_in_month = cal_days_in_month(0, $month, $year) ;
//Here we start building the table heads

?>



<br />

<ul class='main-calendar'>
    <li class='main-day-header' >
        <div class='main-title'>
            <a class="floatleft" href="{{ action('DashboardController@index') }}?month=<?php echo $month-1 ?>&year=<?php echo $year ?>" >Prev</a>
<?php echo $title . " " .  $year; ?>
            <a class="floatright" href="{{ action('DashboardController@index') }}?month=<?php echo $month+1 ?>&year=<?php echo $year ?>" >Next</a>
        </div>
        <div class="main-labels">
            <div class='main-label'>Sun</div>
            <div class='main-label'>Mon</div>
            <div class='main-label'>Tue</div>
            <div class='main-label'>Wed</div>
            <div class='main-label'>Thu</div>
            <div class='main-label'>Fri</div>
            <div class='main-label'>Sat</div>
        </div>
</li>

<?php
//This counts the days in the week, up to 7

$day_count = 1;



echo "<li class='main-week'>";

//first we take care of those blank days

while ( $blank > 0 )

{

    echo "<div class='previous-month main-day'>&nbsp;</div>";

    $blank = $blank-1;

    $day_count++;

}

//sets the first day of the month to 1

$day_num = 1;

$namesforcal = array();

foreach($gigs as $gig){
    $gigdate = $gig->gig_date;
    $strarr = str_split($gigdate, 1);
    $gigtimestamp = $strarr;
    $gigday = $gigtimestamp[3].$gigtimestamp[4];
    $gigmonth = $gigtimestamp[0].$gigtimestamp[1];
    $gigyear = $gigtimestamp[8].$gigtimestamp[9];
    $giginfo = array();
    $giginfo[0] = $gig->gig_name;
    $giginfo[1] = $gig->id;
    $random = rand();
    $namesforcal[intval($gigyear)][intval($gigmonth)][intval($gigday)][intval($random)] = $giginfo;
}

//count up the days, untill we've done all of them in the month

while ( $day_num <= $days_in_month )

{

    echo "<div class='main-day'>$day_num";
    if(isset($namesforcal[$shortyear])) {
        if (isset($namesforcal[intval($shortyear)][intval($month)])) {
            if(isset($namesforcal[intval($shortyear)][intval($month)][intval($day_num)])) {
                foreach($namesforcal[intval($shortyear)][intval($month)][intval($day_num)] as $thegigness){
                    echo "<br /><a class='main-event' href='/gigs/$thegigness[1]' >$thegigness[0]</a><br />";
                }
            }
        }
    }
    echo "</div>";

    $day_num++;

    $day_count++;



    //Make sure we start a new row every week

    if ($day_count > 7)

    {

        echo "</li><li class='main-week'>";

        $day_count = 1;

    }

}

//Finaly we finish out the table with some blank details if needed

while ( $day_count >1 && $day_count <=7 )

{

    echo "<div class='main-day'>&nbsp;</div>";

    $day_count++;

}


echo "</li></ul>";
?>