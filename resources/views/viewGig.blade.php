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
            <div class="gig-header"><h4>{{ $gig[0]->gig_name }}</h4><h1 data-formated-date="<?php $newDate = date("m/d/Y", strtotime($gig[0]->gig_date)); echo $newDate; ?>"><?php $newDate = date("M | d | Y", strtotime($gig[0]->gig_date)); echo $newDate; ?></h1>
                    <h2>
                        @if($gig[0]->category == '0')
                        Cosmetologist
                        @elseif($gig[0]->category == '1')
                        DJ
                        @elseif($gig[0]->category == '2')
                        Graphic Artist
                        @elseif($gig[0]->category == '3')
                        Makeup Artist
                        @elseif($gig[0]->category == '4')
                        Musician
                        @elseif($gig[0]->category == '5')
                        Party Planner
                        @elseif($gig[0]->category == '6')
                        Photographer
                        @elseif($gig[0]->category == '7')
                        Videographer
                        @elseif($gig[0]->category == '8')
                        Web Development
                        @else
                        Other
                        @endif
                    </h2></div><!-- INSERT GIG NAME, DATA, CATEGORY HERE. NOTE: data-formatted-data: need this for the edit modal. To reformat the date you can use Date(m/d/Y,$datestring) and Date(F | d | Y,$datestring)  respectively. -->
            <div class="gig-actions">
                <img class="delete-large delete modal-trigger"  data-modal="delete-gig" src={{ asset('img/delete-large.png') }} alt="Delete" />
                <img class="edit-large edit modal-trigger" data-modal="edit-gig" src={{ asset('img/edit-large.png') }} alt="Edit" />
            </div>
        </div>

        <div id="view-gig" data-id={{ $gig[0]->id }}<!-- INSERT GIG ID HERE -->

            <div class="row">

                <div class="four columns gig-client" data-client-id={{ $gig[0]->client_id }}<!--INSERT CLIENT ID HERE -->
                    <h1>{{ $clientInfo[0]->name }}</h1><!-- INSERT CLIENT NAME HERE -->
                    <div class="client-contact">
                        <h2>Contact</h2>
                        <div class="client-contact-type">Email: <span class="client-contact-value">{{ $clientInfo[0]->email }}</span></div><!-- INSERT CLIENT EMAIL HERE -->
                        <div class="client-contact-type">Phone: <span class="client-contact-value">{{ $clientInfo[0]->phone }}</span></div><!-- INSERT CLIENT PHONE HERE -->
                    </div>
                    <div class="client-location">
                        <h2>Location</h2>
                        <span>{{ $clientInfo[0]->address }}</span><!-- INSERT CLIENT LOCATION HERE -->
                    </div>
                </div><!-- gig-client -->

                <div class="four columns gig-package" data-package-id={{ $packageInfo[0]->id }}<!-- INSERT PACKAGE ID HERE -->
                    <h1>Service Package</h1>
                    <ul class="mCustomScrollbar" data-mcs-theme="dark">
                        <li><h6>{{ $packageInfo[0]->package_name }}</h6></li><!-- INSERT PACKAGE NAME HERE -->
                        <?php $total = 0 ?>
                        @for($i=0; $i<count($servicesInfo); $i++)
                        <li><span class="item">{{ $servicesInfo[$i]->service_name }}<span class="amount">({{ $servicesInfo[$i]->service_qty }})</span></span><span class="cost">${{ $servicesInfo[$i]->service_price }}</span></li><!-- INSERT PACKAGE ITEMS INFO HERE -->
                        <?php
                        $serviceTotal = $servicesInfo[$i]->service_qty * $servicesInfo[0]->service_price;
                        $total = $total + $serviceTotal;
                        ?>
                        @endfor
                        <li><h1 class="total-cost">${{ $total }}</h1></li><!-- INSERT TOTAL COST HERE -->
                    </ul>
                </div><!-- gig-package -->

                <div class="four columns gig-gear">
                    <h1>Gear</h1>
                    <ul class="mCustomScrollbar" data-mcs-theme="dark">
                        @for($j=0; $j<count($gearInfo); $j++)
                        <li class="gig-gear-item" data-item-id={{ $gearInfo[$j]->gear_id }}><?php $gearName = DB::table('gears')->where('id', $gearInfo[$j]->gear_id )->pluck('gear_name'); echo $gearName; ?></li><!-- INSERT GEAR INFO HERE -->
                       @endfor
                    </ul>
                </div><!-- gig-gear -->

                <div class="four columns gig-category" data-category-id={{ $gig[0]->category }} ><!-- INSERT CATEGORY ID HERE -->
                    @if($gig[0]->category == '8')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/web-development.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '0')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/cosmetologist.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '4')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/musician.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '5')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/party-planner.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '6')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/photographer.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '7')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/videographer.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '1')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/dj.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '2')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/graphic-artist.png') }} alt="gear Name" />
                    @elseif($gig[0]->category == '3')
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/makeup-artist.png') }} alt="gear Name" />
                    @else
                    <img class="gig-icon" data-category-id={{ $gig[0]->category }} src={{ asset('img/other.png') }} alt="gear Name" />
                    @endif
                </div><!-- gig-category -->

            </div><!-- row -->

            <div class="row">

                <div class="four columns gig-invoice-contract">
                    <div class="gig-invoice" data-invoice-id={{ $gig[0]->id }}>
                        <h1>Invoice</h1>
                        <p>Payment Received?</p>
                        <p class="collection-options"><a @if($invoiceInfo[0]->paid === 'Yes') class="currently-selected" @endif href="/invoices/{{ $invoiceInfo[0]->id }}/toggle">Yes</a><a @if($invoiceInfo[0]->paid === 'No') class="currently-selected" @endif href="/invoices/{{ $invoiceInfo[0]->id }}/toggle">No</a></p><!-- INSERT HREFS, NOTE 'currently-selected' class. -->
                        <a class="action-icon" href="/invoices/{{ $invoiceInfo[0]->id }}/download"><img src={{ asset('img/download-large.png') }} alt="Download" title="Download"></a><!-- INSERT DOWNLOAD HREF -->
                        <a class="action-icon" target="_blank" href="/invoices/{{ $invoiceInfo[0]->id }}/print"><img src={{ asset('img/print-large.png') }} alt="Print" title="Print"></a><!-- INSERT PRINT  HREF -->
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
                        @for($k=0; $k<count($employeesInfo); $k++)
                        <li class="gig-employee" data-employee-id={{ $employeesInfo[$k]->employee_id }}><span class="name"><?php $employeeName = DB::table('employees')->where('id', $employeesInfo[$k]->employee_id)->pluck('name'); echo $employeeName;?></span><span class="job-title"><?php $employeeJob = DB::table('employees')->where('id', $employeesInfo[$k]->employee_id)->pluck('job_title'); echo $employeeJob;?></span><span class="email"><?php $employeeEmail = DB::table('employees')->where('id', $employeesInfo[$k]->employee_id)->pluck('email'); echo $employeeEmail;?></span></li><!-- INSERT EMPLOYEE INFO HERE -->
                        @endfor
                    </ul>
                </div><!-- gig-employees -->

                <div class="four columns gig-notes">
                    <h1>Notes</h1>
                    <p class="mCustomScrollbar" data-mcs-theme="dark">{{ $gig[0]->notes }}</p><!--INSERT NOTES HERE -->
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

<!-- POPULATE WITH ALL CLIENTS IN DB LINKED TO THE CURRENT USER -->
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