@extends('app')

@section('content')

<h1>Gear Page</h1>

@foreach($gear as $gear)

<div>
    <p>{{ $gear->item_name }}</p>
    {!! Form::open(['route'=> ['gear.destroy', $gear->id], 'method'=>'DELETE']) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
    {!! Form::close() !!}

    {!! Form::open(['route'=> ['gear.update', $gear->id], 'method'=>'PUT']) !!}
    {!! Form::text('item_name') !!}
    {!! Form::submit('Edit', array('class' => 'btn btn-danger')) !!}
    {!! Form::close() !!}
    <hr>
</div>
@endforeach

<form action="{{ action('GearController@store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <input type="item_name" name="item_name" id="item_name" placeholder="Item name" required />
    </div>

    <input type="submit" value="Create" />
</form>



@endsection
