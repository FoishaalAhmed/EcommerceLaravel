<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
    	return view('user.checkout');
    }

    public function save_shipping_detail(Request $request)
    {
    	$this->validate($request,[
            'shipping_name' => 'required|string',
            'shipping_email' => 'required|string',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_city' => 'required'
        ]);

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_city'] = $request->shipping_city;

        $shipping_id = DB::table('shippings')->insertGetId($data);
       
       	Session::put('shipping_id',$shipping_id);
        Session::put('shipping_name',$request->shipping_name);
        return redirect('user/payment');
    }

}
