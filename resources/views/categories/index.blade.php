@extends('layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style="text-align: center"> </div>
    </div>
    <div class="box">
        <div class="box-header">
            <a href="{{url('/')}}/categories/create" class="btn btn-success btn-md">Add Category</a>
        </div>
        <br/>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{url('/')}}/categories/update/{{$category->id}}">Update</a>
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