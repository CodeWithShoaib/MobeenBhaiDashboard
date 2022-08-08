<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
class adminController extends Controller
{
    function showlogin(Request $request)
    {


        return view('backend.login');
    }
    function logout(){
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect(route('showlogin'));
    }


    function login(Request $request){
        // $admin=new admin;
        // $admin->email=$request->email;
        // $admin->Password=Hash::make($request->Password);
        // $admin->save();
        // if($admin){
        //     return redirect(route('dashboard'))->with('message','you are login');

        // }else{
        //     return redirect()->back()->with('message','please insert right details');
        // }
        session()->put('user',"login");
        $user=admin::where(["email"=>$request->email])->first();
       if ($user) {
        $request->session()->put("user","admin");
        return redirect(route('dashboard'))->with('message','you are login');
      }else{
       echo "you are not login";
      }

    }



    function viewdashboard(){
        return view('backend.dashboard');
    }

}
