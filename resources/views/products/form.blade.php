@extends('layouts.app')

@section('content')

    <section class="content">
      <!-- Main row -->
      <div class="row">
        <form id="product-frm">   
            <div class="panel-body">
                @if(Request::segment(2) == 'update')
                 <div class="row">
                    <div class="col-md-4">    
                        <div class="form-group">
                          <label for="image" >Product Picture</label>
                          <br>
                          <img src="{{url('/')}}/uploads/{{$product->product_img}}" height="350px" width="350px">
                        </div>
                    </div>
                 </div> 
                 @endif
                 <div class="row">
                    <div class="col-md-6">    
                        <div class="form-group">
                          <label for="image">Product Picture</label>
                          <input type="file" class="form-control" id="image" name="product_img">
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="empnum">Product Category</label>
                          <select class="form-control" name="category_id">
                              @foreach($categories as $category)
                              <option value="{{$category->id}}" {{isset($product) && $product->id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="empnum">Product Name</label>
                          <input type="text" class="form-control" id="empnum" name="name" value="{{isset($product) ? $product->name : ''}}" placeholder="Enter Product Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="empnum">Product Price</label>
                          <input class="form-control" type="text" id="price" name="price" placeholder="Enter Price" value="{{isset($product) ? $product->price : ''}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="empnum">Product Description</label>
                        <textarea class="form-control" name="description"  rows="7" cols="50">{{isset($product->description) ? $product->description : '' }}</textarea>
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
