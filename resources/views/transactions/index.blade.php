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
                    <th>Customer Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Customer #1</td>
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
                <h5 class="modal-title">Transaction ID: 01</h5>
            </div>
            <div class="modal-body">
                <p><strong>Order Date:</strong></p>
                <p>2017-10-05</p>
                <p><strong>Address:</strong></p>
                <p>Sample Address Customer #1</p>
                <p><strong>Products:</strong></p>
                <p>1 Whole Chicken - 120/kg </p>
                <p>3 Salmon - 200/kg</p>
                <p><strong>Total Price:</strong></p>
                <p>320.00 PHP</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Deliver Now</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>