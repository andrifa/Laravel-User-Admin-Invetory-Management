@extends('layouts.appadmin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>All Inventory List</h3>
            </div>
        </div>

        @if ($message = Session::get("success"))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-hover table-sm">
            <tr>
                <th width = "50px"><b>No.</b></th>
                <th width = "300px"><b>Product Name</b></th>
                <th width = "50px"><b>Quantity</b></th>
                <th>Description</th>
                <th width = "180px"><b>Action</b></th>
            </tr>

            @foreach ($inventories as $inventory)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$inventory->product}}</td>
                    <td>{{$inventory->quantity}}</td>
                    <td>{{$inventory->description}}</td>
                    <td>
                        @if ($inventory->status == "Approved")
                            <strong>{{$inventory->status}}</strong>
                        @elseif ($inventory->status == "Rejected")
                            <strong>{{$inventory->status}}</strong>
                        @else
                            <form action="{{ route('admin.inventory.update', $inventory->id) }}" method="post">
                                {{ csrf_field() }}
                                {!! method_field('put') !!}
                                <!-- <button type="submit" class="btn btn-sm btn-success">Confirm</button> -->
                                <button type="submit" name="action" class="btn btn-sm btn-success" value="confirm">Confirm</button> 
                                <button type="submit" name="action" class="btn btn-sm btn-danger" value="reject">Reject</button>    
                            </form>
                        @endif                        
                    </td>
                </tr>
            @endforeach
        </table>

{!! $inventories->links() !!}
    </div>

@endsection
