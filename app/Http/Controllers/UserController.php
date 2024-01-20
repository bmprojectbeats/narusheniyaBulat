<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    function applications(){
        $client_id = Auth::user()->id;
        $apps = Application::where('user_id', $client_id)->paginate('5');
        $user = User::find($client_id);
        return view('applications', ['apps' => $apps, 'user' => $user]);
    }
    function desc(){
        $client_id = Auth::user()->id;
        $apps = Application::where('user_id', $client_id)->orderBy('created_at', 'desc')->paginate('5');
        $user = User::find($client_id);
        return view('applications', ['apps' => $apps, 'user' => $user]);
    }
    function asc(){
        $client_id = Auth::user()->id;
        $apps = Application::where('user_id', $client_id)->orderBy('created_at', 'asc')->paginate('5');
        $user = User::find($client_id);
        return view('applications', ['apps' => $apps, 'user' => $user]);
    }
    function signup(){
        return view('signup');
    }
    function signup_valid(Request $request){
 
        $request->validate([
            "name" => "required|string|regex:/^[а-яА-Я]+$/",
            "surname" => "required|string|regex:/^[а-яА-Я]+$/",
            "lastname" => "required|string|regex:/^[а-яА-Я]+$/",
            "number" => "required",
            "email" => "required|unique:users",
            "password" => "required|min:6",
        ]);
        $user = User::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'lastname'=>$request->lastname,
            'number'=>$request->number,
            'role'=>2,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if($user){
            return redirect('/signin');
        }
    }
    function signin(){
        return view('signin');
    }
    function signin_valid(Request $request){
        $user = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        if($user){
            return redirect('/applications');
        }
        else{
            return redirect('/signin')->with('error', 'Данные введены неправильно!!');
        }
    }

    function create_app(Request $request){
        $request->validate([
            "description" => "required",
            "number_auto" => "required|min:6",
        ]);
        $client_id = Auth::user()->id;
        $app = Application::create([
            'description' => $request->description,
            'number_auto' => $request->number_auto,
            'status' => 1,
            'user_id' => $client_id,
        ]);
        if($app){
            return redirect('/applications');
        }
    }

    function signout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
