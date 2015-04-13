@extends('app')

@section('content')

<h1>This Package</h1>

<h3>{{ $package->package_name }}</h3>

{!! Form::open(['route'=> ['packages.destroy', $package->id], 'method'=>'DELETE']) !!}
{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
{!! Form::close() !!}

{!! Form::open(['route'=> ['packages.update', $package->id], 'method'=>'PUT']) !!}
{!! Form::text('package_name') !!}
{!! Form::submit('Edit', array('class' => 'btn btn-danger')) !!}
{!! Form::close() !!}



@endsection
