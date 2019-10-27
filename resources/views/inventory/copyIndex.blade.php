@extends('layouts.app')
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
                <!-- <th width = "180px"><b>Action</b></th> -->
            </tr>
            </thead>

            <!-- @foreach ($inventories as $inventory)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$inventory->product}}</td>
                    <td>{{$inventory->quantity}}</td>
                    <td>{{$inventory->description}}</td>
                    <td>
                        @if ($inventory->status == "Approved")
                            <form action="{{ route('inventory.destroy', $inventory->id) }}" method="post">
                                <a class="btn btn-sm btn-warning" href="{{route('inventory.edit', $inventory->id)}}">Edit</a> 
                                {{ csrf_field() }}
                                {!! method_field('delete') !!}
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>    
                            </form>
                        @elseif ($inventory->status == "Rejected")
                            <strong>Item Rejected</strong>
                        @else
                            <strong>Waiting for verification</strong>
                        @endif
                        
                    </td>
                </tr>
            @endforeach -->
        </table>

<!-- {!! $inventories->links() !!} -->
    </div>

<!-- @endsection -->
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
            { data: 'description', name: 'description' }
        ]
    });
});
</script>
@endpush