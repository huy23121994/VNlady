<?php

namespace App\Http\Controllers;

use App\User;
use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{
    public function getIndex(Request $request){
    	if ($request->session()->has('admin')) {
    		return redirect('/manager/item');
    	}
        return view('backend/sign-in');
    }

    public function postSignin(Request $request){
    	$data = $request->all();
        $validator = Validator::make($data,
            [
                'account'=>'required',
                'password'=>'required',
            ]
        );
        if ($validator->fails()) {
            $errors = $validator->messages();
            echo json_encode($errors);
        }else{
            $admin = User::where('account',$data['account'])->first();
            if ($admin) {
                if ($data['password']==$admin['password']) {
                    session(['admin'=>$admin]);
                    echo "success";
                }else{
                    echo "fail: incorrect password";
                }
            }else{
                echo "fail: Not exists user";
            }
        }

    }

    public function getSignout(Request $request){
    	$request->session()->flush();
    	return redirect('/');
    }
}
