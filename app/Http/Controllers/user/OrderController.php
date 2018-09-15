<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Cart;
use Session;

class OrderController extends Controller
{
    public function order_place(Request $request)
    {
    	// payments table
    	$payment_method = $request->payment_method;
    	$pdata = array();
    	$pdata['payment_method'] = $payment_method;
    	$pdata['payment_status'] = 'pending';

    	$payment_id = DB::table('payments')->insertGetId($pdata);

    	// orders table
    	$odata = array();
    	$odata['customer_id'] = Session::get('id');
    	$odata['shipping_id'] = Session::get('shipping_id');
    	$odata['payment_id'] = $payment_id ;
    	$odata['order_total'] = Cart::total();
    	$odata['order_status'] = 'pending';

    	$order_id = DB::table('orders')->insertGetId($odata);

    	// order_details table
    	$contents = Cart::content();
    	$oddata = array();

    	foreach ($contents as $content) {
    		$oddata['order_id'] = $order_id;
    		$oddata['product_id'] = $content->id;
    		$oddata['product_name'] = $content->name;
    		$oddata['product_price'] = $content->price;
    		$oddata['product_quantity'] = $content->qty;

    		DB::table('order_details')->insertGetId($oddata);
    	}

    	if ($payment_method == 'handcash') {
    		Cart::destroy();
    		return view('user.pay_confirm');
    	}elseif($payment_method == 'bkash'){
    		Cart::destroy();
    		return view('user.pay_confirm');
    	}else{
    		echo 'Not Selected';
    	}

    }
}
