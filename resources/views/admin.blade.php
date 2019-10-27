@extends('layouts.appadmin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>All Users List</h3>
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
                <th width = "200px"><b>Name</b></th>
                <th width = "200px"><b>Email</b></th>
                <th width = "200px"><b>Action</b></th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{ route('admin.update', $user->id) }}" method="post">
                            {{ csrf_field() }}
                            {!! method_field('put') !!}
                            @if ($user->status == "active")
                                <button type="submit" name="action" class="btn btn-sm btn-warning" value="disable">Disable User</button>
                            @else
                                <button type="submit" name="action" class="btn btn-sm btn-warning" value="active">Activate User</button>
                            @endif
                            <button type="submit" name="action" class="btn btn-sm btn-warning" value="reset">Reset Password</button> 
                            <button type="submit" name="action" class="btn btn-sm btn-danger" value="delete">Delete User</button>    
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

{!! $users->links() !!}
    </div>

@endsection
