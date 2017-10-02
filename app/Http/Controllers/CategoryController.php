<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

    	return view('categories.index', ['categories' => $categories]); 
    }

    public function form($id = 0) {
    	

    	if($id == 0) {
    		return view('categories.form');

    	} else {
	    	$category = Category::where('id', $id)->first();
    		return view('categories.form', ['category'  => $category]);
    	}
    }

    public function store(Request $request) {

        $category = new Category;
        
        $message = [
        	'name'   		   		=> 'Product name is required',
        ];
        

        $this->validate($request, [
	            'name'   		=> 'required',
         ], $message);



        $category->category_id  = $request->input('category_id');
        $category->name  = $request->input('name');
        $category->price  = $request->input('price');    	

    	$category->save();
    }

    public function update(Request $request, $id) {

        $category = Category::where('id', $id)->first();

        $message = [
        	'name'   		   		=> 'Category name is required',
        ];
        

        $this->validate($request, [
	            'name'   		=> 'required',
         ], $message);



        $category->name  = $request->input('name');

    	$category->save();
    }
}
