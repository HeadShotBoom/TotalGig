@extends('app')

@section('content')

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
                @foreach($packages as $package)
                <div class="package" data-package-id={{ $package->id }}>
                    @if($package->category == 'Web-Development')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/web-development.png') }} alt="package Name" />
                    @elseif($package->category == 'Cosmetologist')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/cosmetologist.png') }} alt="package Name" />
                    @elseif($package->category == 'Musician')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/musician.png') }} alt="package Name" />
                    @elseif($package->category == 'Party-Planner')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/party-planner.png') }} alt="package Name" />
                    @elseif($package->category == 'Photography')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/photographer.png') }} alt="package Name" />
                    @elseif($package->category == 'Videography')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/videographer.png') }} alt="package Name" />
                    @elseif($package->category == 'DJ')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/dj.png') }} alt="package Name" />
                    @elseif($package->category == 'Graphic-Artist')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/graphic-artist.png') }} alt="package Name" />
                    @elseif($package->category == 'Makeup-Artist')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/makeup-artist.png') }} alt="package Name" />
                    @elseif($package->category == 'Other')
                    <img class="package-icon" data-category-id={{ $package->category }} src={{ asset('img/other.png') }} alt="package Name" />
                    @endif
                    <div data-id="1" class="content">
                        <h1>{{ $package->package_name }}</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <?php $total = 0 ?>
                            @foreach($package->service as $service)
                            <tr>
                                <td class="service-quantity">{{ $service->service_qty }}</td>
                                <td class="service-name">{{ $service->service_name }}</td>
                                <td class="service-price">${{ $service->service_price }}.00</td>
                            </tr>
                            <?php $total = $total + $service->service_price ?>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">${{ $total }}.00</td>
                            </tr>
                            </tbody>

                        </table>
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
