<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class authmanager extends Controller
{
    function login()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('login');
    }
    function register()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('register');
    }
    function rent()
    {
        // an sql query to get all the properties from the database
        // bring the provinces from the database without repeating them
        $provinces = DB::table('properties')->select('province')->distinct()->get();
        $properties = DB::table('properties')->get();
        // get the least price and the highest price but not according to the assci order
        $minprice = DB::table('properties')->select('*')->min('price');

        $maxprice = DB::table('properties')->max('price');
        return view('rent', ['properties' => $properties, 'provinces' => $provinces, 'minprice' => $minprice, 'maxprice' => $maxprice]);

    }
    function addproperty()
    {
        return view('add-property');
    }
    function postproperty(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'province' => 'required',
            'address' => 'required',
            'price' => 'required',
            'rooms_number' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,wepb',
        ]);
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $images[] = $imageName;
                } else {
                    return redirect()->back()->withErrors(['error' => 'Failed to upload one or more images.']);
                }
            }
        }
        $data['description'] = $request->description;
        $data['province'] = $request->province;
        $data['address'] = $request->address;
        $data['message'] = $request->message;
        $data['price'] = $request->price;
        $data['rooms_number'] = $request->rooms_number;
        $data['propertyownerid'] = Auth::user()->id;
        $data['images'] = json_encode($images);
        $property = DB::table('properties')->insert($data);
        if ($property) {
            return redirect(route('rent'))->with("success", 'Property added successfully');
        }
        return redirect(route('add-property'))->with("error", 'Failed to add property');
    }
    function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "your data is wrong , please rewrite it");


    }

    function registerpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required'
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('register'))->with("error", "shdmfqslkjfqlfhlqkhfqmlfhd");
        }
        return redirect(route('login'))->with("success", "ya bagra");
    }
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    function adminpage()
    {
        return view('adminpage');
    }
}
