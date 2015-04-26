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
            <h1>Business Name > <span class="page-title">Employees</span></h1>
        </div>

        <div class="row">
            <div class="sort three columns alpha" type="button" onclick="toggleSort()" data-status="closed">Sort By<div class="arrow-down" ></div>
					<span class="hide sort-options">
						<a href="/employees" class="active">Name</a>
						<a href="/employees/job">Job Title</a>
						<a href="/employees/pay">Pay</a>
					</span>
            </div>
            <button class="add-item three columns omega modal-trigger" data-modal="add-employee">Add Employee</button>
        </div>

        <div>
            <table class="large-table">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Pay</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $employee)
                <tr class="content" data-id={{ $employee->id }}>
                    <td class="name">{{ $employee->name }}</td>
                    <td class="job-title">{{ $employee->job_title }}</td>
                    <td class="pay">{{ $employee->pay_rate }}</td></hr >
                    <td class="email">{{ $employee->email }}</td>
                    <td class="phone">{{ $employee->phone }}</td>
                    <td>
                        <img class="edit modal-trigger" data-modal="edit-employee" src={{ asset('img/edit.png') }} alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-employee" src={{ asset('img/delete.png') }} alt="Delete" />
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
<input id="csrf-token" type="hidden" name="_token" value={{ $thisUser->remember_token }}>
</body>

@endsection