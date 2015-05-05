@extends('app')

@section('content')
<header>
    <div class="container">
        <div class="four columns"><a href="index.html" id="header-logo">Total Gig</a></div>
        <div class="twelve columns">
            @include('partial.nav')
        </div>
    </div>
</header>
@endsection
