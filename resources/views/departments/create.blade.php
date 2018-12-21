@extends('layouts.master')

@section('content')
    {!! Form::open([
            'route' => 'departments.store',
            ]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        {!! Form::label( __('Name'), 'Nom du département:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label( __('Description'), 'Description du département:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit("Créer un département", ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection