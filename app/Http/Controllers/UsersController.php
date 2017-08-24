<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UsersController extends Controller
{
	public function __construct()
    {
      $this->middleware('auth',[
        'only'=>['edit','update','destroy']
      ]);

      $this->middleware('guest',[
        'only'=>['create']
      ]);

    }

    public function login() {
    	return view('Admin/login');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'email'=>'required|email|max:255',
        'password'=>'required'
      ]);

      $credentials=[
        'email'=>$request->email,
        'password'=>$request->password,
      ];

      if(Auth::attempt($credentials,$request->has('remember'))){
          session()->flash('success','欢迎回来！');
    		return redirect('news');

      }else{
        session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
        return redirect()->back();
      }

    }

    public function destroy() {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }

    public function admin() {
    	if (Auth::check()) {
    		return view('Admin.admin');
    	} else {
       		return redirect('login');
    	}
    }
}
