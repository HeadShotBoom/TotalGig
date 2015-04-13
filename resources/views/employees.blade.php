@extends('app')

@section('content')

<h1>Employee Page</h1>

@foreach($employees as $employee)

<div>
    <p>{{ $employee->name }}</p>
    {!! Form::open(['route'=> ['employees.destroy', $employee->id], 'method'=>'DELETE']) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
    {!! Form::close() !!}

    {!! Form::open(['route'=> ['employees.update', $employee->id], 'method'=>'PUT']) !!}
    {!! Form::text('name') !!}
    {!! Form::submit('Edit', array('class' => 'btn btn-danger')) !!}
    {!! Form::close() !!}
    <hr>
</div>
@endforeach

<form action="{{ action('EmployeeController@store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <input type="name" name="name" id="name" placeholder="Employee name" required />
    </div>

    <input type="submit" value="Create" />
</form>



@endsection
