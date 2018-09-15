<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\user\Customer;
use Illuminate\Http\Request;
use Session;
use DB;

class LoginController extends Controller
{
   public function index()
    {
    	return view('user.login');
    }

    public function registration(Request $request)
    {
    	$this->validate($request,[
            'customer_name' => 'required|string',
            'customer_email' => 'required|string|unique:customers',
            'customer_password' => 'required',
            'customer_phone' => 'required',
            'password_confirmation' => 'required'
        ]);

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('customers')->insertGetId($data);
       
       	Session::put('id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return redirect('user/checkout');
    }

    public function login(Request $request)
    {
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);

        $result = DB::table('customers')
                ->where('customer_email',$customer_email)
                ->where('customer_password',$customer_password)
                ->first();

        if ($result) {
            Session::put('customer_name',$result->customer_name);
            Session::put('id',$result->id);
            return redirect(route('user.checkout'));
        }else{
            return redirect()->back()->with(['error'=>'User Email or Password Does Not Match.']);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect(route('user.login'));
    }
}
