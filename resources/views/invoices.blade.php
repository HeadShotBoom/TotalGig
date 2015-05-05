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
            <h1>{{ $thisUser->business }} > <span class="page-title">Invoices</span></h1>
        </div>

        <div class="row">
            <div class="sort three columns alpha" type="button" onclick="toggleSort()" data-status="closed">Sort By<div class="arrow-down" ></div>
					<span class="hide sort-options">
						<a href="/invoices" class="active">Number</a>
						<a href="/invoices/created">Created</a>
						<a href="/invoices/total">Total</a>
						<a href="/invoices/paid">Paid</a>
					</span>
            </div>
        </div>

        <div>
            <table class="large-table">

                <thead>
                <tr>
                    <th>Number</th>
                    <th>Created</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Gig</th>
                    <th>Client</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                <tr class="content" data-id={{ $invoice->id }}<!-- INSERT INVOICE ID HERE -->
                    <td class="number">{{ $invoice->id }}</td>
                    <td class="created">{{ $invoice->date }}</td>
                    <td class="cost">${{ $invoice->total }}</td>
                    <td class="paid"><a href="#">{{ $invoice->paid }}</a></td> <!-- This link should go to a function that updates the gig as the opposite of what it currently displays. I.E. if the invoice is not paid, 												  the link should take it to a function that updates it to paid and vice versa. -->
                    <td class="invoice-gig">{{ $invoice->name }}</td>
                    <td class="invoice-client"><?php $clientName = DB::table('clients')->where('id', $invoice->client)->pluck('name'); echo $clientName;?></td>
                    <td>
                        <a href="#"><img class="download" src={{ asset("img/download.png") }} alt="Download" /></a> <!-- Link to download -->
                        <a href="#"><img class="print" src={{ asset("img/print.png") }} alt="Print" /></a> <!-- Link to print -->
                    </td>
                </tr>

                @endforeach
                </tbody>

            </table>
        </div>

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
