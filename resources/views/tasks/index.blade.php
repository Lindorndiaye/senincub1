@extends('layouts.master')
@section('heading')
    <h1>Toutes les tâches</h1>
@stop

@section('content')
    <table class="table table-hover" id="tasks-table">
        <thead>
        <tr>

            <th>{{ __('Titre') }}</th>
            <th>{{ __('Créé à') }}</th>
            <th>{{ __('Date limite') }}</th>
            <th>{{ __('Attribué') }}</th>

        </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
    $(function () {
        $('#tasks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('tasks.data') !!}',
            columns: [

                {data: 'titlelink', name: 'title'},
                {data: 'created_at', name: 'created_at'},
                {data: 'deadline', name: 'deadline'},
                {data: 'user_assigned_id', name: 'user_assigned_id',},

            ]
        });
    });
</script>
@endpush