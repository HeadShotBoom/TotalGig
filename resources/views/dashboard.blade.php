@extends('app')

@section('content')
<body>

<!-- Primary Page Layout
================================================== -->
<header>
    <div class="container">
        <div class="four columns"><a href='/dashboard' id="header-logo">Total Gig</a></div>
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

                @include('partial.calendar')



            </div><!-- calendar-container -->

        </div><!-- dashboard-calendar -->

    </div><!-- container -->
</div><!-- content-container -->

<footer>
    <div class="container">
        <img src={{ asset('img/main-logo.png') }} alt="Total Gig" />
        <a class="highlight" href="mailto:admin@totalgig.com">admin@totalgig.com</a><br>
        <span class="copyright">Copyright &copy; 2015 Total Gig<br>All rights reserved</span>
    </div><!-- container -->
</footer>

<!-- HIDDEN INPUTS - FILL THESE LISTS WITH APPROPRIATE DB DATA IN ORDER TO POPULATE ADD-GIG FORM SELECT MENUS
============================================================================================================= -->
<!-- POPULATE WITH ALL GIG CATEGORIES IN DB -->
<ul class="hide" data-populate="category">
    <li data-db-value="0">Cosmetologist</li>
    <li data-db-value="1">DJ</li>
    <li data-db-value="2">Graphic-Artist</li>
    <li data-db-value="3">Makeup-Artist</li>
    <li data-db-value="4">Musician</li>
    <li data-db-value="5">Party-Planner</li>
    <li data-db-value="6">Photographer</li>
    <li data-db-value="7">Videography</li>
    <li data-db-value="8">Web-Development</li>
    <li data-db-value="9">Other</li>
</ul>

<ul class="hide" data-populate="clients">
    @foreach($clients as $client)
    <li data-db-value={{ $client->id }} >{{ $client->name }}</li>
    @endforeach
</ul>

<!-- POPULATE WITH ALL EMPLOYEES IN DB LINKED TO THE CURRENT USER -->
<ul class="hide" data-populate="employees">
    @foreach($employees as $employee)
    <li data-db-value={{ $employee->id }} >{{ $employee->name }} </li>
    @endforeach
</ul>

<!-- POPULATE WITH ALL SERVICE PACKAGES IN DB LINKED TO THE CURRENT USER -->
<ul class="hide" data-populate="service-packages">
    @foreach($packages as $package)
    <li data-db-value={{ $package->id }} > {{ $package->package_name }}</li>
    @endforeach
</ul>

<!-- POPULATE WITH ALL GEAR IN DB LINKED TO THE CURRENT USER -->
<ul class="hide" data-populate="gear">
    @foreach($gears as $gear)
    <li data-db-value={{ $gear->id }}>{{ $gear->gear_name }}</li>
    @endforeach
</ul>

<div class="hide fill-background">
</div><!--fill-background -->
<!-- End Document
================================================== -->
<input id="csrf-token" type="hidden" name="_token" value={{ $thisUser->remember_token }}>
</body>

@endsection


