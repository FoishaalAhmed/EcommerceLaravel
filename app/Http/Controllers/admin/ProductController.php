<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Brand;
use App\Model\admin\Category;
use App\Model\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adminCheck();
        $products = DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->join('brands','brands.id','=','products.brand_id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
        return view('admin.product.show',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->adminCheck();
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.product',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Product_name' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'color' => 'required',
        ]);
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $product_img_name=$image->getClientOriginalName();
            $ext1 = $request->image->getClientOriginalExtension();
            $product_img_name=time().'.'.$ext1;
            $upload_path_for_product_img='uploaded_files/product-img/';
            $image->move( $upload_path_for_product_img,$product_img_name);
        }
        $products = new Product;
        $products->Product_name = $request->Product_name;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->price = $request->price;
        $products->image = $product_img_name;
        $products->size = $request->size;
        $products->color = $request->color;
        $products->save();
        return redirect()->back()->with(['success'=>'Products Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->adminCheck();
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit',compact('product','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'Product_name' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'color' => 'required',
        ]);
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $product_img_name=$image->getClientOriginalName();
            $ext1 = $request->image->getClientOriginalExtension();
            $product_img_name=time().'.'.$ext1;
            $upload_path_for_product_img='uploaded_files/product-img/';
            $image->move( $upload_path_for_product_img,$product_img_name);
        }
        $products = Product::find($id);
        $products->Product_name = $request->Product_name;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->price = $request->price;
        $products->image = $product_img_name;
        $products->size = $request->size;
        $products->color = $request->color;
        $products->save();
        return redirect()->back()->with(['success'=>'Products Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = product::where('id',$id)->first();
       if (file_exists("/uploaded_files/product-img/$data->image")) {
          unlink('/uploaded_files/product-img/$data->image');
       }
       
        $data->delete();
        return redirect()->back()->with(['success'=>'producr Deleted Successfully']);
    }

    public function adminCheck()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return redirect(route('admin.login'))->send();
        }
    }

}
