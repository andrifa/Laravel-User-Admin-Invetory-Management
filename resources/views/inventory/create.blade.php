@extends('layouts.applte')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>New Inventory</h3>
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

        <form action="{{route('inventory.store')}}" method="post">
            {{ csrf_field() }}     
            <div class="row">
                <div class="col-md-12">
                    <strong>Product Name :</strong>
                    <input type="text" name="product" class="form-control" placeholder="Nama Product">
                </div>
                <div class="col-md-12">
                    <strong>Quantity :</strong>
                    <input type="text" name="quantity" class="form-control" placeholder="Total Quantity">
                </div>
                <div class="col-md-12">
                    <strong>Description :</strong>
                    <textarea name="description" class="form-control" cols="8" rows="8" placeholder="Product Description"></textarea>
                </div>
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                <input type="hidden" name="status" value="needApproval">
                
                <div class="col-md-12">
                    <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>
@endsection