<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Customer;
use app\Transaction;

class ApiController extends Controller
{
    public function register(Request $request) 
    {
    	dd($request->all());
    }


    public function purchase(Request $request)
    {
    	dd($request->all());
    }

    public function history($uid)
    {
    	dd($uid);
    }


}
