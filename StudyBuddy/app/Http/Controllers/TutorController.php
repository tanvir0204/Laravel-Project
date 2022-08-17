<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutor;
use App\Models\Listing;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TutorController extends Controller
{
    /* Show Tutor Form */
    public function create()
    {
        return view('tutors.register');
    }

    /* Store Tutor */
    public function store(Request $req)
    {
        $formVal = $req->validate(
            [
                'name' => 'required|max:30',
                'email' => 'required|email|ends_with:.com,.me,.edu',
                'password' => 'required',
                 'password2' => 'required|same:password'
            ],
    
            [
                "name.required" => "This field is required",
                "email.required" => "This field is required",
                "password.required" => "This field is required",
                "name.max" => "Name should not exceed 30 characters"
            ]
          );


        $formVal['password'] = bcrypt($formVal['password']);
        $formVal['type'] = "tutor";

        User::create($formVal);

        Session::flash('msg', 'Registered Successfully');
        
        return redirect()->route('user.login');
    }


    /* Tutor Logout */
    public function logout(Request $req)
    {
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        Session::flash('msg', 'Logged Out Successfully');
        return redirect()->route('user.login');
    }

    /* Tutor Dashboard */
    public function dashboard()
    {
        return view('tutors.dashboard', [
            'heading' => 'Latest Tuition Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    /* Show Tutor Profile */
    public function show()
    {
        return view('tutors.edit');
    }

    /* Tutor Update */
    public function update(Request $req)
    {
        $formVal = $req->validate(
            [
                'name' => 'required|max:30',
                'email' => 'required|email|ends_with:.com,.me,.edu',
                'password' => 'required'
            ],
    
            [
                "name.required" => "This field is required",
                "email.required" => "This field is required",
                "password.required" => "This field is required",
                "name.max" => "Name should not exceed 30 characters"
            ]
          );

        // if ($req->hasFile('p_file')) {
        //     $formVal['p_file'] = $req->file('p_file')->store('files', 'public');
        // }

        if (Hash::check($formVal['password'], Auth::user()->password, [])) {
            $formVal['password'] = bcrypt($formVal['password']);
        } 
        else {
            $formVal['password'] = bcrypt($formVal['password']);
        }

        $user = User::find(auth()->user()->id);
        $user->update($formVal);

        Session::flash('msg', 'Profile Updated');
        return redirect()->route('tutor.dashboard');
    }
    
}
