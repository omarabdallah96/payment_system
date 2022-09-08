@extends('layouts.app')
<style>
    .paginate_button:hover {
        border: 0px;
        background-color: blue !important;
    }

    .dataTables_paginate:hover {
        background-color: none !important;
    }

    li {
        background-color: none;
    }
</style>
@section('content')


<div class="container mt-3">
    @if(Session('error'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6 class="alert-heading">{{ Session('error') }}</h6>
    </div>

    @endif
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            //change paging style

            ajax: "{{ route('admin.users.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    disabled: true
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],

            pageLength: 5,
            language: {


            }

        });

    });

    function Delete(id) {
        alert('Delete Success');
    }
    /* Set the defaults for DataTables initialisation */
</script>
@endsection
