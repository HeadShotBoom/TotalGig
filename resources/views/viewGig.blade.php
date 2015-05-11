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

        <div class="row">
            <div class="gig-header"><h4>Photo Shoot</h4><h1 data-formated-date="05/23/2015">May | 23 | 2015</h1><h2>Photography</h2></div><!-- INSERT GIG NAME, DATA, CATEGORY HERE. NOTE: data-formatted-data: need this for the edit modal. To reformat the date you can use Date(m/d/Y,$datestring) and Date(F | d | Y,$datestring)  respectively. -->
            <div class="gig-actions">
                <img class="delete-large delete modal-trigger"  data-modal="delete-gig" src={{ asset('img/delete-large.png') }} alt="Delete" />
                <img class="edit-large edit modal-trigger" data-modal="edit-gig" src={{ asset('img/edit-large.png') }} alt="Edit" />
            </div>
        </div>

        <div id="view-gig" data-id="0"><!-- INSERT GIG ID HERE -->

            <div class="row">

                <div class="four columns gig-client" data-client-id="0"><!--INSERT CLIENT ID HERE -->
                    <h1>Alta Alred</h1><!-- INSERT CLIENT NAME HERE -->
                    <div class="client-contact">
                        <h2>Contact</h2>
                        <div class="client-contact-type">Email: <span class="client-contact-value">AAlred@email.com</span></div><!-- INSERT CLIENT EMAIL HERE -->
                        <div class="client-contact-type">Phone: <span class="client-contact-value">(123) 456-7890</span></div><!-- INSERT CLIENT PHONE HERE -->
                    </div>
                    <div class="client-location">
                        <h2>Location</h2>
                        <span>Salt Lake City, UT</span><!-- INSERT CLIENT LOCATION HERE -->
                    </div>
                </div><!-- gig-client -->

                <div class="four columns gig-package" data-package-id="0"><!-- INSERT PACKAGE ID HERE -->
                    <h1>Service Package</h1>
                    <ul class="mCustomScrollbar" data-mcs-theme="dark">
                        <li><h6>Package Name</h6></li><!-- INSERT PACKAGE NAME HERE -->
                        <li><span class="item">Fake smile<span class="amount">(3)</span></span><span class="cost">$49.99</span></li><!-- INSERT PACKAGE ITEMS INFO HERE -->
                        <li><span class="item">Real smile<span class="amount">(1)</span></span><span class="cost">$199.99</span></li>
                        <li><span class="item">Hours<span class="amount">(5)</span></span><span class="cost">$19.99</span></li>
                        <li><span class="item">Forces smile<span class="amount">(1)</span></span><span class="cost">$99.99</span></li>
                        <li><h1 class="total-cost">$549.90</h1></li><!-- INSERT TOTAL COST HERE -->
                    </ul>
                </div><!-- gig-package -->

                <div class="four columns gig-gear">
                    <h1>Gear</h1>
                    <ul class="mCustomScrollbar" data-mcs-theme="dark">
                        <li class="gig-gear-item" data-item-id="0">Backpack</li><!-- INSERT GEAR INFO HERE -->
                        <li class="gig-gear-item" data-item-id="1">Camera</li>
                        <li class="gig-gear-item" data-item-id="2">Mini Camera</li>
                    </ul>
                </div><!-- gig-gear -->

                <div class="four columns gig-category" data-category-id="1" ><!-- INSERT CATEGORY ID HERE -->
                    <img src="img/photographer.png" alt="Photography" title="Photography">
                </div><!-- gig-category -->

            </div><!-- row -->

            <div class="row">

                <div class="four columns gig-invoice-contract">
                    <div class="gig-invoice" data-invoice-id="0">
                        <h1>Invoice</h1>
                        <p>Payment Received?</p>
                        <p class="collection-options"><a href="#">Yes</a><a class="currently-selected" href="#">No</a></p><!-- INSERT HREFS, NOTE 'currently-selected' class. -->
                        <a class="action-icon" href="#"><img src={{ asset('img/download-large.png') }} alt="Download" title="Download"></a><!-- INSERT DOWNLOAD HREF -->
                        <a class="action-icon" href="#"><img src={{ asset('img/print-large.png') }} alt="Print" title="Print"></a><!-- INSERT PRINT  HREF -->
                    </div><!-- gig-invoice -->

                    <div class="gig-contract" data-contract-id="0">
                        <h1>Contract</h1>
                        <p class="">Item Signed</p>
                        <p class="collection-options"><a class="currently-selected" href="#">Yes</a><a href="#">No</a></p><!-- INSERT HREFS, NOTE 'currently-selected' class. -->
                        <a class="action-icon" href="#"><img src={{ asset('img/download-large.png') }} alt="Download" title="Download"></a><!-- INSERT DOWNLOAD HREF -->
                        <a class="action-icon" href="#"><img src={{ asset('img/print-large.png') }} alt="Print" title="Print"></a><!-- INSERT PRINT  HREF -->
                    </div><!-- gig-contract -->
                </div><!-- gig-invoice-contract -->

                <div class="eight columns gig-employees">
                    <h1>Employees</h1>
                    <ul class="mCustomScrollbar" data-mcs-theme="dark">
                        <li class="gig-employee" data-employee-id="0"><span class="name">Arden Jewel</span><span class="job-title">Photographer</span><span class="email">AJewel@email.com</span></li><!-- INSERT EMPLOYEE INFO HERE -->
                        <li class="gig-employee" data-employee-id="1"><span class="name">Kade Barbara</span><span class="job-title">Photographer</span><span class="email">Kbarbal@email.com</span></li>
                    </ul>
                </div><!-- gig-employees -->

                <div class="four columns gig-notes">
                    <h1>Notes</h1>
                    <p class="mCustomScrollbar" data-mcs-theme="dark">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum.Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec ullamcorper nulla non metus auctor fringilla.</p><!--INSERT NOTES HERE -->
                </div><!-- gig-notes -->

            </div><!-- row -->

        </div><!-- view-gig -->

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
    <li data-db-value="1">Kade Barbara </li>
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
    <li data-db-value="0">Backpack</li>
    <li data-db-value="1">Camera</li>
    <li data-db-value="2">Mini Camera</li>
    <!-- ETC ETC ETC -->
</ul>

<div class="hide fill-background">
</div><!--fill-background -->
<!-- End Document
================================================== -->
</body>
@endsection