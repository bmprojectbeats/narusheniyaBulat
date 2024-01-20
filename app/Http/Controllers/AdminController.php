<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function applications(){
        $apps =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')->paginate('5');
        return view('admin/applicatoins', ["apps"=>$apps]);
    }
    function desc(){
        $apps =  DB::table('applications')->join('users', 'users.id', '=', 'applications.user_id')->orderBy('created_at', 'desc')->paginate('5');
        return view('admin/applicatoins', ["apps"=>$apps]);
    }
    function asc(){
        $apps =  DB::table('applications')->join('users', 'users.id', '=', 'applications.user_id')->orderBy('created_at', 'asc')->paginate('5');
        return view('admin/applicatoins', ["apps"=>$apps]);
    }
    function signin(){
        return view('admin/signin');
    }
    function signin_valid(Request $request){
        $user = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>1,
        ]);
        if($user){
            $request->session()->regenerate();
            return redirect('/applications_adm');
        }
        else{
            return redirect('/signin')->with('error', 'Данные введены неправильно!!');
        }
    }
    function accept($id){
        $app = Application::where('id_app', $id)->update(['status' => 2]);
        if($app){
            return redirect('/applications_adm');
        }

    }
    function decline($id){
        $app = Application::find($id)->update(['status' => 3]);
        if($app){
            return redirect('/applications_adm');
        }
    }
}
