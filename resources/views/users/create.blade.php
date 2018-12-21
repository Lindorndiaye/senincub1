@extends('layouts.master')
@section('heading')
    <h1>{{ __('Créer un utilisateur') }}</h1>
@stop

@section('content')
    {!! Form::open([
            'route' => 'users.store',
            'files'=>true,
            'enctype' => 'multipart/form-data'

            ]) !!}
    @include('users.form', ['submitButtonText' => __('Créer un utilisateur')])

    {!! Form::close() !!}


@stop
