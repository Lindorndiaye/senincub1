@extends('layouts.master')
@section('heading')
    Modifier Client ({{$client->name}})
@stop

@section('content')
    {!! Form::model($client, [
            'method' => 'PATCH',
            'route' => ['clients.update', $client->id],
            ]) !!}
    @include('clients.form', ['submitButtonText' => __('Mettre à jour le client')])

    {!! Form::close() !!}

@stop