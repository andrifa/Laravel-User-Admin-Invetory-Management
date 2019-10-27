@extends('layouts.applte')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>My Inventory List</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('inventory.create') }}">Create New Inventory</a>
            </div>
        </div>

        @if ($message = Session::get("success"))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-hover table-sm" id="users-table">
            <thead>
            <tr>
                <th width = "50px"><b>No.</b></th>
                <th width = "300px"><b>Product Name</b></th>
                <th width = "50px"><b>Quantity</b></th>
                <th>Description</th>
                <th width = "180px"><b>Action</b></th>
               
            </tr>
            </thead>

           
        </table>

    </div>

@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "http://localhost:8000/inventory/get_datatable",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'product', name: 'product' },
            { data: 'quantity', name: 'quantity' },
            { data: 'description', name: 'description' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
    
    $('#users-table').on('click', '.btn-delete[data-remote]', function (e) { 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('#users-table').DataTable().draw(false);
        });
    });

});
</script>
@endpush