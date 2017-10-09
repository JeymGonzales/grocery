<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Transaction;
use Validator;
use DB;

class ApiController extends Controller
{
    public function register(Request $request) 
    {
        $reg = new Customer;

        // dd($request->all());

        $messages  = [
            'email.required'   => 'Please fill up all fields',
            'bday.required'   => 'Please fill up all fields',
            'number.required'   => 'Please fill up all fields',
            'first_name.required'   => 'Please fill up all fields',
            'last_name.required'   => 'Please fill up all fields',
            'address.required' => 'Please fill up all fields',
            'username.required'   => 'Please fill up all fields',
            'password.required'   => 'Please fill up all fields',
            'username.unique'     => 'Username is already taken',
            'email.unique'     => 'Email is already registered',
            'password.min'        => 'Password must be 7 characters long',
            'username.min'        => 'Username must be 7 characters long',
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:customers',
            'img'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|max:255|min:7',
            'address' => 'required|max:255',
            'bday' => 'required|max:255',
            'number' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255|unique:customers|min:7',
        ], $messages);

        if ($validator->fails()) {
            // $message = $validator->errors();
            foreach($validator->errors()->getMessages() as $k => $validationErrors){
                if (is_array($validationErrors)) {
                    foreach($validationErrors as $validationError):

                    $error[] = $validationError;
                    endforeach;
                } else {
                    $error[] = $validationErrors;
                }
            }

            return $this->sendResponse($error[0], NULL, false, 'user');
        }


        if( $request->hasFile('img'))
        {
            $file = $request->file('img');
            $unique_code = strtotime(date('Ymd His'));

            $dir = 'users';

            $upload_file = $dir."_".$unique_code.'-img'.".".$file->getClientOriginalExtension();

            $file->move('./uploads/'.$dir.'/',$upload_file);
            $reg->img   = $upload_file;
        }

        $reg->first_name  = $request->input('first_name');
        $reg->last_name  = $request->input('last_name');
        $reg->bday  = $request->input('bday');
        $reg->number  = $request->input('number');
        $reg->email  = $request->input('email');
        $reg->address  = $request->input('address');
        $reg->username  = $request->input('username');
        $reg->password  = bcrypt($request->input('password'));


        $reg->save();

        if(!$reg)
        {
            return $this->sendResponse('Something Went Wrong', NULL ,false,'user');
        } else {
            return $this->sendResponse('Registration Success', $reg, true, 'user');
        }
    }


    public function purchase(Request $request)
    {
        $trans = new Transactions;
        $trans->user_id     = $request->input('user_id');
        $trans->products    = $request->input('products');
        $trans->save();
    }

    // user id
    public function history($uid)
    {
        $history = Transaction::where('user_id', $uid)->get();

        if(count($history) > 0)
        {
            return $this->sendResponse('History', $reg, true, 'history');
        } else {
            return $this->sendResponse('No Transaction Data', NULL ,false,'history');
        }
    }

    // category id
    public function products($cid)
    {
        $products = Product::where('category_id', $cid)->get();
        return $this->sendResponse('Products', $products, true, 'products');
    }

    // product id
    public function view($pid)
    {
        $products = Product::where('id', $pid)->get();

        if(count($products) > 0)
        {
            return $this->sendResponse('Products', $reg, true, 'products');
        } else {
            return $this->sendResponse('No Transaction Data', NULL ,false,'products');
        }
    }

    public function login(Request $request)
    {

          $messages  = [
          'username.required'     => 'Username field is Required',
          'password.required'     => 'Password field is Required',
              ];

          $validator = Validator::make($request->all(), [
              'username' => 'required',
              'password' => 'required',
          ], $messages);

          if ($validator->fails()) {

              foreach($validator->errors()->getMessages() as $k => $validationErrors){
                  if (is_array($validationErrors)) {
                      foreach($validationErrors as $validationError):

                      $error[] = $validationError;
                      endforeach;
                  } else {
                      $error[] = $validationErrors;
                  }
              }

              return $this->sendResponse($error[0], $data, false, 'user');
          }

          $data = Customer::where([
              'username'     => $request->username,
          ])->first();


          if(empty($data) || !password_verify($request->password, $data->password)){

              return $this->sendResponse('Username or Password Incorrect', NULL, false, 'user');
          } else {
              return $this->sendResponse('Login success', $data, true, 'user');

          }
    }


}
