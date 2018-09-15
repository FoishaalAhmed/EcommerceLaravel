<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        $this->adminCheck();
    	return view('admin.login');
    }

    public function login(Request $request)
    {
    	$admin_email = $request->email;
    	$admin_password = md5($request->password);

    	$result = DB::table('admins')
    			->where('email',$admin_email)
    			->where('password',$admin_password)
    			->first();

    	if ($result) {
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->id);
    		return redirect(route('admin-home'));
    	}else{
    		return redirect()->back()->with(['error'=>'User Email or Password Does Not Match.']);
    	}
    }

    public function logout()
    {
    	Session::flush();
    	return redirect(route('admin.login'));
    }

    public function adminCheck()
    {
        $admin_id = Session::get('admin_id');
        if(!$admin_id){
            return;
        }else{
            return redirect(route('admin-home'))->send();
        }
    }
}








































/*$admin_email = $request->email;
    	$admin_password = md5($request->password);

    	$result = DB::table('admins')
    			->where('email',$admin_email)
    			->where('password',$admin_password)
    			->first();

    	if ($result) {
    		Session::put('admin_name',$result->name);
    		Session::put('admin_id',$result->id);
    		return Redirect::to('admin-home');
    	}else{
    		return redirect()->back()->with(['error'=>'User Email or Password Does Not Match.']);
    	}*/