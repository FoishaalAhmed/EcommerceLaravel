<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\admin\Brand;
use App\Model\admin\Category;
use App\Model\admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$brands = Brand::all();

    	$products = DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->limit(6)
        ->get();

        $sliders = Slider::all();

    	return view('user.home',compact('categories','brands','products','sliders'));
    }

    public function show_product_by_category($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->where('categories.id',$id)
        ->limit(6)
        ->get();

        return view('user.products_by_category',compact('categories','brands','products'));
    }

    public function show_product_by_brand($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->where('brands.id',$id)
        ->limit(6)
        ->get();

        return view('user.products_by_brand',compact('categories','brands','products'));
    }

    public function product_details($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->where('products.id',$id)
        ->first();

        return view('user.product_details',compact('categories','brands','product'));
    }
}
