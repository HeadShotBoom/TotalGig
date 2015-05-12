@extends('app')

@section('content')
<body>

<!-- Primary Page Layout
================================================== -->
<header>
    <div class="container">
        <div class="four columns"><a href="index.html" id="header-logo">Total Gig</a></div>
        <div class="twelve columns">
            @include('partial.nav')
        </div>
    </div>
</header>

<div class="content-container">
    <div class="container">

        <div class="breadcrumbs row">
            <h1>{{ $thisUser->business }} > <span class="page-title">Dashboard</span></h1>
        </div>

        <div class="dashboard-gigs row">

            <h2>Upcoming Gigs</h2>

            <div class="gigs">

                <!-- ONLY LOAD THE SEVEN MOST RECENT GIGS, PLUS THE VIEW MORE BUTTON AT THE END OF THiS DIV -->
                @foreach($upcomingGigs as $gig)
                <div class="gig">
                    <a href="/gigs/{{ $gig->id }}">
                    @if($gig->category == '8')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/web-development.png') }} alt="gear Name" />
                    @elseif($gig->category == '0')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/cosmetologist.png') }} alt="gear Name" />
                    @elseif($gig->category == '4')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/musician.png') }} alt="gear Name" />
                    @elseif($gig->category == '5')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/party-planner.png') }} alt="gear Name" />
                    @elseif($gig->category == '6')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/photographer.png') }} alt="gear Name" />
                    @elseif($gig->category == '7')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/videographer.png') }} alt="gear Name" />
                    @elseif($gig->category == '1')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/dj.png') }} alt="gear Name" />
                    @elseif($gig->category == '2')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/graphic-artist.png') }} alt="gear Name" />
                    @elseif($gig->category == '3')
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/makeup-artist.png') }} alt="gear Name" />
                    @else
                    <img class="gig-icon" data-category-id={{ $gig->category }} src={{ asset('img/other.png') }} alt="gear Name" />
                    @endif
                    <h1>{{ $gig->gig_name }}</h1></a>
                    <h2><a href="/clients">Alta Alred</a></h2>
                    <p><?php $newDate = date("M | d | Y", strtotime($gig->gig_date)); echo $newDate; ?></p> <!-- Use PHP date() function to convert for format. For example $newDate = date("M | d | Y", strtotime($originalDate)); -->
                </div>
                @endforeach

                <!-- THIS IS THE VIEW MORE BUTTON. LOAD IT AFTER ALL THE OTHER GIGS -->
                <div class="gig view-more-button">
                    <a class="gig-icon" href="/gigs">
                        <img class="gig-icon" src={{ asset('img/view-more.png') }} alt="View More" title="View More" />
                        <h1>View More</h1>
                    </a>
                </div>

            </div><!-- gigs -->

        </div>

        <div class="dashboard-calendar">

            <div class="row">
                <h2>Calendar</h2>
                <button class="add-item three columns omega modal-trigger" data-modal="add-gig">Add Gig</button>
            </div>

            <div class="calendar-container">

                <ul class='main-calendar'>
                    <li class='main-day-header' >
                        <div class='main-title'>
                            <a class="prev" href="http://oldtg/calendar?month=4&year=2015" >Prev</a><span class="main-month">May 2015</span><a class="next" href="http://oldtg/calendar?month=6&year=2015" >Next</a>
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
                    <li class='main-week'>
                        <div class='previous-month main-day'>&nbsp;</div>
                        <div class='previous-month main-day'>&nbsp;</div>
                        <div class='previous-month main-day'>&nbsp;</div>
                        <div class='previous-month main-day'>&nbsp;</div>
                        <div class='previous-month main-day'>&nbsp;</div>
                        <div class='main-day'>1</div>
                        <div class='main-day'>2</div>
                    </li>
                    <li class='main-week'>
                        <div class='main-day'>3</div>
                        <div class='main-day'>4</div>
                        <div class='main-day'>5</div>
                        <div class='main-day'>6</div>
                        <div class='main-day'>7</div>
                        <div class='main-day'>8</div>
                        <div class='main-day'>9</div>
                    </li>
                    <li class='main-week'>
                        <div class='main-day'>10</div>
                        <div class='main-day'>11</div>
                        <div class='main-day'>12</div>
                        <div class='main-day'>13</div>
                        <div class='main-day'>14</div>
                        <div class='main-day'>15</div>
                        <div class='main-day'>16</div>
                    </li>
                    <li class='main-week'>
                        <div class='main-day'>17</div>
                        <div class='main-day'>18</div>
                        <div class='main-day'>19</div>
                        <div class='main-day'>20</div>
                        <div class='main-day'>21</div>
                        <div class='main-day'>22</div>
                        <div class='main-day'>23<a href="view_gig.html" class="main-event">Photo Shoot</a></div><!-- INSERT GIG HREF AND TITLE AS SUCH -->
                    </li>
                    <li class='main-week'>
                        <div class='main-day'>24</div>
                        <div class='main-day'>25</div>
                        <div class='main-day'>26</div>
                        <div class='main-day'>27</div>
                        <div class='main-day'>28</div>
                        <div class='main-day'>29</div>
                        <div class='main-day'>30<a href="view_gig.html" class="main-event">Wedding Shoot</a></div>
                    </li>
                    <li class='main-week'>
                        <div class='main-day'>31</div>
                        <div class='next-month main-day'>&nbsp;</div>
                        <div class='next-month main-day'>&nbsp;</div>
                        <div class='next-month main-day'>&nbsp;</div>
                        <div class='next-month main-day'>&nbsp;</div>
                        <div class='next-month main-day'>&nbsp;</div>
                        <div class='next-month main-day'>&nbsp;</div>
                        <!-- <li class='main-week'></li>
                        <li class='main-week'> </li>
                        <li class='main-week'> </li>
                        <li class='main-week'> </li>
                        <li class='main-week'> </li>
                        <li class='main-week'> </li> -->
                    </li>
                </ul>

            </div><!-- calendar-container -->

        </div><!-- dashboard-calendar -->

    </div><!-- container -->
</div><!-- content-container -->

<footer>
    <div class="container">
        <img src="img/main-logo.png" alt="Total Gig" />
        <a class="highlight" href="mailto:support@totalgig.com">admin@totalgig.com</a><br>
        <span class="copyright">Copyright &copy; 2015 Total Gig<br>All rights reserved</span>
    </div><!-- container -->
</footer>

<!-- HIDDEN INPUTS - FILL THESE LISTS WITH APPROPRIATE DB DATA IN ORDER TO POPULATE ADD-GIG FORM SELECT MENUS
============================================================================================================= -->
<!-- POPULATE WITH ALL GIG CATEGORIES IN DB -->
<ul class="hide" data-populate="category">
    <li data-db-value="0">Web Developer</li>
    <li data-db-value="1">Photographer</li>
    <li data-db-value="2">Videograhper</li>
    <!-- ETC ETC ETC -->
</ul>

<!-- POPULATE WITH ALL CLIENTS IN DB LINKED TO THE CURRENT USER -->
<ul class="hide" data-populate="clients">
    <li data-db-value="0">Alta Alred</li>
    <li data-db-value="1">Derrick Drey</li>
    <li data-db-value="2">Latricia Levi</li>
    <!-- ETC ETC ETC -->
</ul>

<!-- POPULATE WITH ALL EMPLOYEES IN DB LINKED TO THE CURRENT USER -->
<ul class="hide" data-populate="employees">
    <li data-db-value="0">Arden Jewel</li>
    <li data-db-value="1">Dawson Diggory</li>
    <li data-db-value="2">Gus Midge</li>
    <!-- ETC ETC ETC -->
</ul>

<!-- POPULATE WITH ALL SERVICE PACKAGES IN DB LINKED TO THE CURRENT USER -->
<ul class="hide" data-populate="service-packages">
    <li data-db-value="0">Package Name 1</li>
    <li data-db-value="1">Package Name 2</li>
    <li data-db-value="2">Package Name 3</li>
    <!-- ETC ETC ETC -->
</ul>

<!-- POPULATE WITH ALL GEAR IN DB LINKED TO THE CURRENT USER -->
<ul class="hide" data-populate="gear">
    <li data-db-value="0">Macbook</li>
    <li data-db-value="1">Camera</li>
    <li data-db-value="2">Backpack</li>
    <!-- ETC ETC ETC -->
</ul>

<div class="hide fill-background">
</div><!--fill-background -->
<!-- End Document
================================================== -->
</body>

@endsection


