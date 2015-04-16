@extends('app')

@section('content')

<!--<h1>Packages Page</h1>-->
<!---->
<!--@foreach($packages as $package)-->
<!---->
<!--<div>-->
<!--    <a href="{{ action('PackageController@show', [$package->id]) }}">{{ $package->package_name }}</a>-->
<!--</div>-->
<!--@endforeach-->
<!---->
<!--<form action="{{ action('PackageController@store') }}" method="POST">-->
<!--    <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
<!--    <div class="form-row">-->
<!--        <input type="package_name" name="package_name" id="package_name" placeholder="Package name" required />-->
<!--    </div>-->
<!---->
<!--    <input type="submit" value="Create" />-->
<!--</form>-->


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
            <h1>Business Name > <span class="page-title">Packages</span></h1>
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
                <div class="package" data-package-id="0">
                    <img class="package-icon" data-category-id="1" src="img/web-development.png" alt="Package Name" />
                    <div data-id="1" class="content">
                        <h1>Package Name 1</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <tr>
                                <td class="service-quantity">1</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">$1231.91</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="package" data-package-id="1">
                    <img class="package-icon" data-category-id="2" src="img/photographer.png" alt="Package Name" />
                    <div data-id="2" class="content">
                        <h1>Package Name 2</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <tr>
                                <td class="service-quantity">1</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">$1231.91</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="package" data-package-id="2">
                    <img class="package-icon" data-category-id="3" src="img/graphic-artist.png" alt="Package Name" />
                    <div data-id="3" class="content">
                        <h1>Package Name 3</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <tr>
                                <td class="service-quantity">1</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">$1231.91</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="package" data-package-id="3">
                    <img class="package-icon" data-category-id="1" src="img/web-development.png" alt="Package Name" />
                    <div data-id="4" class="content">
                        <h1>Package Name 4</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <tr>
                                <td class="service-quantity">1</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">$1231.91</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="package" data-package-id="4">
                    <img class="package-icon" data-category-id="4" src="img/party-planner.png" alt="Package Name" />
                    <div data-id="5" class="content">
                        <h1>Package Name 5</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <tr>
                                <td class="service-quantity">1</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">$1231.91</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="package" data-package-id="5">
                    <img class="package-icon" data-category-id="5" src="img/videographer.png" alt="Package Name" />
                    <div data-id="6" class="content">
                        <h1>Package Name 6</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <tr>
                                <td class="service-quantity">1</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">$1231.91</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="package" data-package-id="6">
                    <img class="package-icon" data-category-id="6" src="img/other.png" alt="Package Name" />
                    <div data-id="7" class="content">
                        <h1>Package Name 7</h1>
                        <img class="edit modal-trigger" data-modal="edit-package" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-package" src="img/delete.png" alt="Delete" />

                        <table class="services mCustomScrollbar" data-mcs-theme="dark">

                            <tbody>
                            <tr>
                                <td class="service-quantity">1</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$99.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">32</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td class="service-quantity">3</td>
                                <td class="service-name">Service Name</td>
                                <td class="service-price">$999.99</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="sum">$1231.91</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

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
</body>

@endsection
