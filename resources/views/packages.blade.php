@extends('app')

@section('content')
{{--
<h1>Packages Page</h1>

@foreach($packages as $package)

<div>
    <a href="{{ action('PackageController@show', [$package->id]) }}">{{ $package->package_name }}</a>
</div>
@endforeach

<form action="{{ action('PackageController@store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <input type="package_name" name="package_name" id="package_name" placeholder="Package name" required />
    </div>

    <input type="submit" value="Create" />
</form>
--}}

<body>
<!-- Primary Page Layout
	================================================== -->
<header>
    <div class="container">
        <div class="four columns"><a href="/" id="header-logo">Total Gig</a></div>
        <div class="twelve columns">
          @include('partial.nav')
        </div>
    </div>
</header>

<div class="content-container">
    <div class="container">

        <div class="breadcrumbs row">
            <h1>{{ $thisUser->business }} > <span class="page-title">Packages</span></h1>
        </div>

        <div class="row">
            <button class="sort three columns alpha" type="button" onclick="toggleSort()" data-status="closed">Sort By<div class="arrow-down" ></div>
					<span class="hide sort-options">
						<a href="#">Name</a>
						<a href="#" class="active">Price</a>
						<a href="#">Gig Category</a>
					</span>
            </button>
            <button class="add-item three columns omega modal-trigger" data-modal="add-package">Add Package</button>
        </div>



        <div class="packages row">
            <div class="row">
                @foreach($packages as $package)


                <div class="package" data-package-id={{ $package->id }}>
                    @if($package->category == 'Web-Development')
                    <img class="package-icon" data-category-id="1" src={{ asset('img/web-development.png') }} alt="package Name" />
                    @elseif($package->category == 'Cosmetologist')
                    <img class="package-icon" data-category-id="1" src={{ asset('img/cosmetologist.png') }} alt="package Name" />
                    @elseif($package->category == 'Musician')
                    <img class="package-icon" data-category-id="1" src={{ asset('img/musician.png') }} alt="package Name" />
                    @elseif($package->category == 'Party-Planner')
                    <img class="package-icon" data-category-id="1" src={{ asset('img/party-planner.png') }} alt="package Name" />
                    @elseif($package->category == 'Photography')
                    <img class="package-icon" data-category-id="1" src={{ asset('img/photographer.png') }} alt="package Name" />
                    @elseif($package->category == 'Videographer')
                    <img class="package-icon" data-category-id="1" src={{ asset('img/videographer.png') }} alt="package Name" />
                    @elseif($package->category == 'Other')
                    <img class="package-icon" data-category-id="1" src={{ asset('img/other.png') }} alt="package Name" />
                    @endif
                    <div data-id="1" class="content">
                        <h1>{{ $package->package_name }}</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            @foreach($package->service as $service)
                            <tr>
                                <td class="service-quantity">{{ $service->service_qty }}</td>
                                <td class="service-name">{{ $service->service_name }}</td>
                                <td class="service-price">{{ $service->service_price }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">Need Sum JS</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            </div>
                @endforeach




        <script type="text/javascript">$(".services").mCustomScrollbar({scrollInertia: 75});</script>
    </div><!-- container -->
</div><!-- content-container -->

<footer>
    <div class="container">
        <img src="img/main-logo.png" alt="Total Gig" />
        <a class="highlight" href="mailto:admin@totalgig.com">admin@totalgig.com</a><br>
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
