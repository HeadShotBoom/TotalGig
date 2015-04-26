@extends('app')

@section('content')

<body>

<!-- Primary Page Layout
================================================== -->
<header>
    <div class="container">
        <div class="four columns"><a href="/dashboard" id="header-logo">Total Gig</a></div>
        <div class="twelve columns">
            @include('partial.nav')
        </div>
    </div>
</header>

<div class="content-container">
    <div class="container">

        <div class="breadcrumbs row">
            <h1>{{ $thisUser->business }} > <span class="page-title">Gear</span></h1>
        </div>

        <div class="row">
            <div class="sort three columns alpha" type="button" onclick="toggleSort()" data-status="closed">Sort By<div class="arrow-down" ></div>
                <span class="hide sort-options">
					<a href="/gear" class="active">Name</a>
					<a href="/gear/cat">Gig Category</a>
				</span>
            </div>
            <button class="add-item three columns omega modal-trigger" data-modal="add-gear">Add Item</button>
        </div>

        <div class="gear row">
            @foreach($gears as $gear)

                <div class="gear-item" data-gear-id={{ $gear->id }}>
                    @if($gear->gig_category == 'Web-Development')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/web-development.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'Cosmetologist')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/cosmetologist.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'Musician')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/musician.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'Party-Planner')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/party-planner.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'Photography')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/photographer.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'Videography')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/videographer.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'DJ')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/dj.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'Graphic-Artist')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/graphic-artist.png') }} alt="gear Name" />
                    @elseif($gear->gig_category == 'Makeup-Artist')
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/makeup-artist.png') }} alt="gear Name" />
                    @else
                    <img class="package-icon" data-category-id={{ $gear->gig_category }} src={{ asset('img/other.png') }} alt="gear Name" />
                    @endif
                    <div data-id={{ $gear->id }} class="content">
                        <h1>{{ $gear->gear_name }}</h1>
                        <img class="edit modal-trigger" data-modal="edit-gear" src={{ asset('img/edit.png') }} alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-gear" src={{ asset('img/delete.png') }} alt="Delete" />
                        <h6>Item Type</h6>
                        <p class="mCustomScrollbar" data-mcs-theme="dark">{{ $gear->gear_description }}</p>
                    </div>
                </div>

            @endforeach
        </div>



        <script type="text/javascript">$(".services").mCustomScrollbar({scrollInertia: 75});</script>
    </div><!-- container -->
</div><!-- content-container -->

<footer>
    <div class="container">
        <img src="img/main-logo.png" alt="Total Gig" />
        <a class="highlight" href="mailto:admin@totalgig.com">admint@totalgig.com</a><br>
        <span class="copyright">Copyright &copy; 2015 Total Gig<br>All rights reserved</span>
    </div><!-- container -->
</footer>

<div class="hide fill-background">
</div><!--fill-background -->
<!-- End Document
================================================== -->
<input id="csrf-token" type="hidden" name="_token" value={{ $thisUser->remember_token }}>
</body>


@endsection
