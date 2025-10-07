<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    //
    public function create()
    {
        if (auth()->guard()->check()) {
            return redirect('/');
        }
        return view("register");
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:13',
            'last_name' => 'required|string|max:13',
            'email' => 'required|string|email|max:100|unique:shops',
            'password' => 'required|string|min:8|confirmed',

        ]);

        // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);


        $shop = Shop::create($validatedData);

        auth()->guard()->login($shop);


        return redirect('/')->with('success', 'User registered successfully!');
    }

    public function logout(Request $request)
    {
        auth()->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully!');
    }

    public function login()
    {
        if (auth()->guard()->check()) {
            return redirect('/');
        }
        return view("login");
    }

    public function logUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->guard()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function getProfile(){
        return view('profile');
    }
    public function updateProfile(Request $request){
        
      $validatedData = $request->validate([
        'id' => 'required',
        'profile_picture' => 'required']);
        $validatedData['profile_picture'] = $request->file('profile_picture')->store('', 'public');
        $user = auth()->guard()->user();
        $shop = Shop::find($user->id);
        if ($shop) {
             $shop->update(['profile_picture' => $validatedData['profile_picture']]);
        }
        
        return redirect('/')->with('success','');
    }
}
