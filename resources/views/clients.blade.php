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
            <h1>{{ $thisUser->business }} > <span class="page-title">Clients</span></h1>
        </div>

        <div class="row">
            <div class="sort three columns alpha" type="button" onclick="toggleSort()" data-status="closed">Sort By<div class="arrow-down" ></div>
					<span class="hide sort-options">
						<a href="/clients/" class="active">Name</a>
						<a href="/clients/loc">Location</a>
					</span>
            </div>
            <button class="add-item three columns omega modal-trigger" data-modal="add-client">Add Client</button>
        </div>

        <div>
            <table class="large-table">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr class="content" data-id={{ $client->id }}>
                    <td class="name">{{ $client->name }}</td>
                    <td class="email">{{ $client->email }}</td>
                    <td class="location">{{ $client->address }}</td>
                    <td class="phone">{{ $client->phone }}</td>
                    <td>
                        <img class="edit modal-trigger" data-modal="edit-client" src={{ asset('img/edit.png') }} alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-client" src={{ asset('img/delete.png') }} alt="Delete" />
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
        <img src={{ asset('img/main-logo.png') }} alt="Total Gig" />
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
