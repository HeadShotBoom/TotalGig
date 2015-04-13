@extends('app')

@section('content')

<h1>This Package</h1>

<h3>{{ $package->package_name }}</h3>
<!--<a href="{{ action('PackageController@destroy') }}">Delete</a>-->

{!! Form::open(['route'=> ['packages.destroy', $package->id], 'method'=>'DELETE']) !!}
{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
{!! Form::close() !!}

<form action="{{ action('PackageController@store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <input type="package_name" name="package_name" id="package_name" placeholder="Package name" required />
    </div>

    <input type="submit" value="Create" />
</form>



@endsection
