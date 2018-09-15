<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Brand;
use Session;
use Illuminate\Http\Request;
session_start();

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adminCheck();
        $brands = Brand::all();
        return view('admin.brand.show',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->adminCheck();
        return view('admin.brand.brand');
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
            'brand_name' => 'required|string',
            'description' => 'required|string|',
        ]);


        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->description = $request->description;
        $brand->save();
        return redirect()->back()->with(['success'=>'brand Added Successfully']);
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
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
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
            'brand_name' => 'required|string',
            'description' => 'required|string|',
        ]);


        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->description = $request->description;
        $brand->save();
        return redirect(route('brand.index'))->with(['success'=>'brand Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->back()->with(['success'=>'brand Deleted Successfully']);
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
