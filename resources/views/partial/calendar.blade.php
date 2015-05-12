@extends('layout')

@section('content')

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
<?php
echo "<ul class='large-8 large-push-2 small-12 columns maincalendar'>";

echo "<li class='title'>"; ?>
<a class="floatleft" href="{{ action('GigController@calendar') }}?month=<?php echo $month-1 ?>&year=<?php echo $year ?>" >Prev</a>
<?php echo $title . " " .  $year; ?>
<a class="floatright" href="{{ action('GigController@calendar') }}?month=<?php echo $month+1 ?>&year=<?php echo $year ?>" >Next</a>
<?php echo "</li>";
echo "<li class='mainday-header' >
<div class='large-1 mainday'>Sun</div>
        <div class='large-1 mainday'>Mon</div>
        <div class='large-1 mainday'>Tue</div>
        <div class='large-1 mainday'>Wed</div>
        <div class='large-1 mainday'>Thu</div>
        <div class='large-1 mainday'>Fri</div>
        <div class='large-1 mainday'>Sat</div>
</li>";


//This counts the days in the week, up to 7

$day_count = 1;



echo "<li class='mainweek'>";

//first we take care of those blank days

while ( $blank > 0 )

{

    echo "<div class='large-1 previous-month mainday'></div>";

    $blank = $blank-1;

    $day_count++;

}

//sets the first day of the month to 1

$day_num = 1;

$namesforcal = array();

foreach($gig as $gig){
    $gigdate = $gig->gig_date;
    $strarr = str_split($gigdate, 1);
    $gigtimestamp = $strarr;
    $gigminutes = $gigtimestamp[11].$gigtimestamp[12].$gigtimestamp[14].$gigtimestamp[15].$gigtimestamp[17].$gigtimestamp[18];
    $gigday = $gigtimestamp[8].$gigtimestamp[9];
    $gigmonth = $gigtimestamp[5].$gigtimestamp[6];
    $gigyear = $gigtimestamp[2].$gigtimestamp[3];

    $giginfo = array();
    $giginfo[0] = $gig->gig_name;
    $giginfo[1] = $gig->id;
    $namesforcal[intval($gigyear)][intval($gigmonth)][intval($gigday)][intval($gigminutes)][0] = $giginfo[0];
    $namesforcal[intval($gigyear)][intval($gigmonth)][intval($gigday)][intval($gigminutes)][1] = $gigtimestamp[11].$gigtimestamp[12].$gigtimestamp[13].$gigtimestamp[14].$gigtimestamp[15];
    $namesforcal[intval($gigyear)][intval($gigmonth)][intval($gigday)][intval($gigminutes)][2] = $giginfo[1];
}

//count up the days, untill we've done all of them in the month

while ( $day_num <= $days_in_month )

{

    echo "<div class='large-1 mainday'>$day_num";
    if(isset($namesforcal[$shortyear])) {
        if (isset($namesforcal[$shortyear][$month])) {
            if(isset($namesforcal[$shortyear][$month][$day_num])) {
                foreach($namesforcal[$shortyear][$month][$day_num] as $thegigness){
                    echo "<br /><a href='/view/$thegigness[2]' >$thegigness[0] @ $thegigness[1]</a><br />";
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

        echo "</li><li class='mainweek'>";

        $day_count = 1;

    }

}

//Finaly we finish out the table with some blank details if needed

while ( $day_count >1 && $day_count <=7 )

{

    echo "<li class='mainweek'> </li>";

    $day_count++;

}


echo "</li></ul>";
?>

@endsection