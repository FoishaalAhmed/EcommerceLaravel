<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$this->adminCheck();
    	return view('admin.home');
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
