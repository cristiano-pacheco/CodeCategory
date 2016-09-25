@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Create Category</h3>

        {!! Form::open(['method'=>'post','route'=>['admin.categories.store']]) !!}

        {{--@include('codecategory::errors')--}}

        <div class="form-group">

            {!! Form::label('Parent',"Parent:") !!}
            <select name="parent_id" class="form-control">
                <option value="">-None-</option>
                @foreach($categories as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('Name',"Name:") !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <label>
                {!! Form::checkbox('active',1) !!} Active
            </label>
        </div>

        <div class="form-group">
            {!! Form::submit('Submit',['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop