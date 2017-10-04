@extends('layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style=""></div>
    </div>
    <div class="box">
        <div class="box-header">
            <a href="{{url('/')}}/products/create" class="btn btn-success btn-md">Add Product</a>
        </div>
        <br/>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->prod_name}}</td>
                <td>{{$product->categ_name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{url('/')}}/products/update/{{$product->id}}">Update</a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
</section>
@endsection
