@extends('layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style="text-align: center"> <a href="{{url('/')}}/categories/create" class="btn btn-success btn-md">Add Category</a></div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Category Name</th>
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
</section>
@endsection
