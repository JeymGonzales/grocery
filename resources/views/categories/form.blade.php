@extends('layouts.app')

@section('content')

    <section class="content">
      <!-- Main row -->
      <div class="row">
        <form id="product-frm">   
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="empnum">Category Name</label>
                          <input type="text" class="form-control" id="empnum" name="name" value="{{isset($category) ? $category->name : ''}}" placeholder="Enter Category Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-3" style="float:right;">
                    <input type="hidden" value="{{csrf_token()}}" id="_token">
                     <button type="submit" class="btn btn-info btn-md" id="prd-save">
                         <span class="glyphicon glyphicon-floppy-save"></span>
                            Submit
                     </button>  
                     <button type="submit" class="btn btn-danger btn-md">
                         <span class="glyphicon glyphicon-remove-sign"></span>
                            Cancel
                     </button>
                </div>   
            </div>    
        </form>
      </div>
    </section>
@endsection
