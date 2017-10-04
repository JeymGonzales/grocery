<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index() {

        $products = DB::table('products')
            			->leftJoin('categories', 'categories.id', '=', 'products.category_id')
			            ->select('products.name as prod_name', 'categories.name as categ_name', 'products.id as id')
            			->get();
    	return view('products.index', ['products'   => $products]); 
    }

    public function form($id = 0) {
    	
	    $categories = Category::all();

    	if($id == 0) {
    		return view('products.form', ['categories'  => $categories]);

    	} else {
	    	$product = Product::where('id', $id)->first();

    		
    		return view('products.form', ['categories'  => $categories,
    								      'product'     => $product]);
    	}
    }


    public function store(Request $request) {

        $product = new Product;
        
        $message = [
        	'name'   		   		=> 'Product name is required',
        	'price.required'   	    => 'Product Price is required',
            'product_img.required'  => 'Product Image is required',
        	'description.required'  => 'Product description is required',
        ];
        

        $this->validate($request, [
                'category_id'   => 'required',
	            'name'   		=> 'required',
	            'price'   		=> 'required',
                'product_img'   => 'required',
	            'description'   => 'required',
         ], $message);



        $product->category_id  = $request->input('category_id');
        $product->name  = $request->input('name');
        $product->price  = $request->input('price');
        $product->description  = $request->input('description');


    	if( $request->hasFile('product_img'))
        { 
            $file = $request->file('product_img'); 
            $unique_code = strtotime(date('Ymd His'));

            $dir = 'products';

            $upload_file = $dir."_".$unique_code.'-img'.".".$file->getClientOriginalExtension();

            $file->move('./uploads/',$upload_file);
            $product->product_img   = $upload_file;
        }
    	

    	$product->save();
    }

    public function update(Request $request, $id) {

        $product = Product::where('id', $id);
        
        $message = [
            'name'                  => 'Product name is required',
        	'description'   		=> 'Description is required',
        	'price.required'   	    => 'Product Price is required',
        ];
        

        $this->validate($request, [
                'category_id'   => 'required',
                'name'          => 'required',
	            'description'   => 'description',
	            'price'   		=> 'required',
         ], $message);



        $product->category_id  = $request->input('category_id');
        $product->name  = $request->input('name');
        $product->price  = $request->input('price');


    	if( $request->hasFile('product_img'))
        { 
            $file = $request->file('product_img'); 
            $unique_code = strtotime(date('Ymd His'));

            $dir = 'products';

            $upload_file = $dir."_".$unique_code.'-img'.".".$file->getClientOriginalExtension();

            $file->move('./uploads/',$upload_file);
            $product->product_img   = $upload_file;
        }
    	

    	$product->save();
    }
}
