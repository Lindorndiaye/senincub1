@extends('layouts.master')
@section('heading')
    <h1>{{__('Tous les Rendez-vous')}}</h1>
@stop

@section('content')
    <table class="table table-hover" id="leads-table">
        <thead>
        <tr>

            <th>{{ __('Titre') }}</th>
            <th>{{ __('Créé par') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Attribué') }}</th>

        </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
    $(function () {
        $('#leads-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('leads.data') !!}',
            columns: [

                {data: 'titlelink', name: 'title'},
                {data: 'user_created_id', name: 'user_created_id'},
                {data: 'contact_date', name: 'contact_date',},
                {data: 'user_assigned_id', name: 'user_assigned_id'},


            ]
        });
    });
</script>
@endpush