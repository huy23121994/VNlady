<?php

namespace App\Http\Controllers;

use Hash;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{
    public function getIndex(Request $request){
    	if ($request->session()->has('admin')) {
    		return redirect('/manager/item#upload');
    	}
        return view('backend/sign-in');
    }

    public function postSignin(Request $request){
    	$data = $request->all();
    	$admin = User::where('account','admin')->first();
    	if ($data['account']==$admin['account'] and $data['password']==$admin['password']) {
    		session(['admin'=>'vnlady']);
    		return redirect('/manager/item');
    	}else{
    		echo "string";
    	}
    }

    public function getSignout(Request $request){
    	$request->session()->flush();
    	return redirect('/');
    }
}
