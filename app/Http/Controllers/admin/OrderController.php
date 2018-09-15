<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\Order;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function all_order()
    {
    	$orders = DB::table('orders')
        ->join('customers','customers.id','=','orders.customer_id')
        ->select('orders.*','customers.customer_name')
        ->get();
    	return view('admin.order.order',compact('orders'));
    }

    public function view_order()
    {
    	$orders_by_id = DB::table('orders')
        ->join('customers','customers.id','=','orders.customer_id')
        ->join('order_details','order_details.order_id','=','orders.order_id')
        ->join('shippings','shippings.shipping_id','=','orders.shipping_id')
        ->select('orders.*','customers.*','order_details.*','shippings.*')
        ->get();

    	return view('admin.order.order_details',compact('orders_by_id'));
    }
}
