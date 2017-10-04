@extends('layouts.app')

@section('content')

<section class="content">

    <div class="row">
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style=""></div>
        <div class="col-sm-4" style="text-align: center"></div>
    </div>
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Customer First Name#1</td>
                    <td>Customer Last Name#1</td>
                    <td style="">
                        <a class="btn btn-default" href="#" data-toggle="modal" data-target="#myModal">View Details</a>
                    </td>
                </tr>
            </tbody>
          </table>
        </div>
    </div>
</section>

@endsection
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Customer Name: Customer #1</h4>
            </div>
            <div class="modal-body">
                <p><strong>Address:</strong></p>
                <p>Sample Address Customer #1</p>
                <p><strong>Contact Number:</strong></p>
                <p>231213132132</p>
                <p><strong>Email Address:</strong></p>
                <p>customer1@gmail.com</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>