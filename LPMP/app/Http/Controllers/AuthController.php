<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\LPMP;
use App\Models\Pengawas;
use App\Models\TPMPS;
// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // auth untuk admin
    function login(){
        return view('auth.login');
    }
    function check(Request $request){
        //Validate request
        $request->validate([
            'name'=>'required',
            'password'=>'required|min:5|max:12'
        ]);


        $userInfo = Admin::where('name','=', $request->name)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your name');
        }else{
            //check password
            if($request->password  === $userInfo->password){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/home');
            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    // auth untuk LPMP
    function loginLpmp(){
        return view('auth.loginLpmp');
    }

    function checkLpmp(Request $request){
        //Validate request
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5|max:12'
        ]);


        $userInfo = LPMP::where('username','=', $request->username)->first();

        if(!$userInfo){
            return back()->with('failLpmp','We do not recognize your username');
        }else{
            //check password
            if($request->password  === $userInfo->password){
                $request->session()->put('LoggedUserLpmp', $userInfo->id);
                return redirect('/lpmp/home');
            }else{
                return back()->with('failLpmp','Incorrect password');
            }
        }
    }
    function logoutLpmp(){
        if(session()->has('LoggedUserLpmp')){
            session()->pull('LoggedUserLpmp');
            return redirect('/');
        }
    }

    //auth Pengawas
    function loginPengawas(){
        return view('auth.loginPengawas');
    }

    function checkPengawas(Request $request){
        //Validate request
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5|max:12'
        ]);


        $userInfo = Pengawas::where('username','=', $request->username)->first();

        if(!$userInfo){
            return back()->with('failPengawas','We do not recognize your username');
        }else{
            //check password
            if($request->password  === $userInfo->password){
                $request->session()->put('LoggedUserPengawas', $userInfo->id);
                return redirect('/pengawas/home');
            }else{
                return back()->with('failPengawas','Incorrect password');
            }
        }
    }
    function logoutPengawas(){
        if(session()->has('LoggedUserPengawas')){
            session()->pull('LoggedUserPengawas');
            return redirect('/');
        }
    }

    //Login LPMP
    function loginTpmps(){
        return view('auth.loginTpmps');
    }

    function checkTpmps(Request $request){
        //Validate request
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5|max:12'
        ]);


        $userInfo = TPMPS::where('username','=', $request->username)->first();

        if(!$userInfo){
            return back()->with('failTpmps','We do not recognize your username');
        }else{
            //check password
            if($request->password  === $userInfo->password){
                $request->session()->put('LoggedUserTpmps', $userInfo->id);
                return redirect('/tpmps/home');
            }else{
                return back()->with('failTpmps','Incorrect password');
            }
        }
    }
    function logoutTpmps(){
        if(session()->has('LoggedUserTpmps')){
            session()->pull('LoggedUserTpmps');
            return redirect('/');
        }
    }

}
