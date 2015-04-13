@extends('app')

@section('content')

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

@endsection
