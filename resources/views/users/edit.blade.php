@extends('layouts.master')

@section('heading')
    <h1>{{ __('Modifier utilisateur') }}</h1>
@stop

@section('content')


    {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.update', $user->id],
            'files'=>true,
            'enctype' => 'multipart/form-data'
            ]) !!}

    @include('users.form', ['submitButtonText' =>  __('Mettre a jour utilisateur')])

    {!! Form::close() !!}

@stop