<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$qty = $request->qty;
    	$product_id = $request->product_id;

    	$product_info = Product::where('id',$product_id)->first();

    	$data['qty'] = $qty;
    	$data['id'] = $product_info->id;
    	$data['name'] = $product_info->Product_name;
    	$data['price'] = $product_info->price;
    	$data['options'] ['image'] = $product_info->image;

    	Cart::add($data);
    	return redirect(route('show-cart'));
    }

    public function show_carts()
    {
    	return view('user.cart');
    }

    public function delete_carts($rowId)
    {
    	Cart::update($rowId,0);

    	return redirect()->back();
    }

    public function update_carts(Request $request)
    {
    	$qty = $request->qty;
    	$rowId = $request->rowId;

    	Cart::update($rowId, $qty);

    	return redirect()->back();
    }
}
