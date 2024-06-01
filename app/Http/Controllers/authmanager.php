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
    function property($id)
    {
        $property = DB::table('properties')->where('id', $id)->first();
        $property->owner= DB::table('users')->where('id', $property->propertyownerid)->first();
        return view('property', ['property' => $property]);
    }
    function rent(Request $request)
    {
        // if one of the filters is selected then the properties will be filtered according to the selected filter, the filters are province, price, rooms_number and rooms_number
        $query = DB::table('properties');
        $minprice = DB::table('properties')->select('*')->min('price');
        $maxprice = DB::table('properties')->max('price');
        if ($request->filled('province')) {
            $query->where('province', $request->province);
        }
        if ($request->filled('room')) {
            $query->where('rooms_number', $request->room);
        }

        if ($request->filled('minPrice')) {
            $query->where('price', '>=', $request->minPrice * $maxprice / 100);
        }

        if ($request->filled('maxPrice')) {
            $query->where('price', '<=', $request->maxPrice * $maxprice / 100);
        }
        $query->where('forrent', 1);
        $properties = $query->get();
        $provinces = DB::table('properties')->select('province')->distinct()->get();
        return view('rent', ['properties' => $properties, 'provinces' => $provinces, 'minprice' => $minprice, 'maxprice' => $maxprice]);

    }

    function buy(Request $request)
    {

        $query = DB::table('properties');
        $minprice = DB::table('properties')->select('*')->min('price');
        $maxprice = DB::table('properties')->max('price');
        if ($request->filled('province')) {
            $query->where('province', $request->province);
        }
        if ($request->filled('room')) {
            $query->where('rooms_number', $request->room);
        }

        if ($request->filled('minPrice')) {
            $query->where('price', '>=', $request->minPrice * $maxprice / 100);
        }

        if ($request->filled('maxPrice')) {
            $query->where('price', '<=', $request->maxPrice * $maxprice / 100);
        }
        $query->where('forrent', 0);
        $properties = $query->get();
        $provinces = DB::table('properties')->select('province')->distinct()->get();
        return view('buy', ['properties' => $properties, 'provinces' => $provinces, 'minprice' => $minprice, 'maxprice' => $maxprice]);

    }
    function addproperty()
    {
        return view('add-property');
    }
    function clients()
    {
        $clients = DB::table('users')->where('usertype', "client")->get();
        return view('clients', ['clients' => $clients]);
    }

    function home()
    {
        $provinces = DB::table('properties')->select('province')->distinct()->get();
        // select the first property from each province
        foreach ($provinces as $province) {
            // take the first image of the property
            $property = DB::table('properties')->where('province', $province->province)->first();
            $property->image = json_decode($property->images)[0];
            $province->property = $property;
        }
        return view('welcome', ['provinces' => $provinces]);
    }
    function postproperty(Request $request)
    {
        $request->validate([
            'message' => 'max:255',
            'description' => 'required',
            'province' => 'required',
            'address' => 'required',
            'price' => 'required',
            'forrent' => 'required',
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
        $data['forrent'] = $request->forrent;
        $data['rooms_number'] = $request->rooms_number;
        $data['propertyownerid'] = Auth::user()->id;
        $data['propertytype']="Hotel";
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required',
            'phone_number' => 'required'
        ]);
        $data['username'] = $request->username;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phone_number;
        $data['usertype'] = "client";
        $data['password'] = Hash::make($request->password);
        // dd($data);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('register'))->with("error", "there is an error ");
        }
        return redirect(route('login'))->with("success", "Successful registration");
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
