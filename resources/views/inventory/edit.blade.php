@extends('layouts.applte')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Edit Inventory</h3>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!!!</strong> there is something wrong with your input. <br>
                <ul>
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul> 
            </div>
        @endif

        <form action="{{route('inventory.update',$inventory->id)}}" method="post">
            {{ csrf_field() }}
            {!! method_field('put') !!}     
            <div class="row">
                <div class="col-md-12">
                    <strong>Product Name :</strong>
                    <input type="text" name="product" class="form-control" value="{{$inventory->product}}">
                </div>
                <div class="col-md-12">
                    <strong>Quantity :</strong>
                    <input type="text" name="quantity" class="form-control" value="{{$inventory->quantity}}">
                </div>
                <div class="col-md-12">
                    <strong>Description :</strong>
                    <textarea name="description" class="form-control" cols="8" rows="8">{{$inventory->description}}</textarea>
                </div>
                <!-- <input type="hidden" name="email" value="andri@gmail.com">
                <input type="hidden" name="status" value="needApproval"> -->
                
                <div class="col-md-12">
                    <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>
@endsection