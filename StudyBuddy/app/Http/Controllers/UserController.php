<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    /* User Login */
    public function login(Request $req)
    {
        return view('users.login');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }



    /* User Login Authenticate*/
    public function authenticate(Request $req)
    {
        $formVal = $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $getUser =  $formVal["email"];

        $user = User::where("email", $getUser)->first();

        if ($user->type == "tutor") {
            if (auth()->attempt($formVal)) {
                $req->session()->regenerate();

                $id=auth()->user()->id;
                $information = Information::where('user_id',$id)->first();

                if(is_null($information)){
                    
                    return redirect()->route('tutor.registerInfo');
                }
                else{
                    Session::flash('msg', 'Logged in Successfully');
                    return redirect()->route('tutor.dashboard');
                }
                
            } 
            else {
                Session::flash('msg', 'Invalid Credentials');
                return back();
            }
        }

        // if (auth()->attempt($formVal)) {
        //     $req->session()->regenerate();

        //     Session::flash('msg', 'Logged in Successfully');
        //     return redirect()->route('user.dashboard');
        // } else {
        //     Session::flash('msg', 'Invalid Credentials');
        //     return back();
        // }
       

        if ($user->type == "admin") {
            if (auth()->attempt($formVal)) {
                $req->session()->regenerate();

                Session::flash('msg', 'Logged in Successfully');
                return redirect('/admin');
            } else {
                Session::flash('msg', 'Invalid Credentials');
                return back();
            }
        }
        if ($user->type == "user") {
            if (auth()->attempt($formVal)) {
                $req->session()->regenerate();

                Session::flash('msg', 'Logged in Successfully');
                return redirect('/users/dashboard');
            } else {
                Session::flash('msg', 'Invalid Credentials');
                return back();
            }
        }
        /* if ($user->type == "tutor") {
            if (auth()->attempt($formVal)) {
                $req->session()->regenerate();

                Session::flash('msg', 'Logged in Successfully');
                return redirect('/tutors/dashboard');
            } else {
                Session::flash('msg', 'Invalid Credentials');
                return back();
            }
        } */

    }

    /* User Registration */
    public function create()
    {
        return view('users.register');
    }

    /* User Store */
    public function store(Request $req)
    {
        $formVal = $req->validate(
        [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email|ends_with:.com,.me,.edu',
            'password' => 'required',
            'password2' => 'required|same:password'
        ],

        [
            "name.required" => "This field is required",
            "email.required" => "This field is required",
           /*  "password.required" => "This field is required", */
            "name.max" => "Name should not exceed 30 characters"
        ]
      );


        $formVal['password'] = bcrypt($formVal['password']);
        User::create($formVal);

        Session::flash('msg', 'Registered Successfully');
        
        return redirect()->route('user.login');
    }

    //User Show
    public function show()
    {
        return view('users.edit');
    }

    /* User Update */
    public function update(Request $req)
    {
        $formVal = $req->validate(
            [
                'name' => 'required|max:30',
                'email' => 'required|email|ends_with:.com,.me,.edu',
                'password' => 'required',
            ],
    
            [
                "name.required" => "This field is required",
                "email.required" => "This field is required",
                "password.required" => "This field is required",
                "name.max" => "Name should not exceed 30 characters"
            ]
          );

        if (Hash::check($formVal['password'], Auth::user()->password, [])) {
            $formVal['password'] = bcrypt($formVal['password']);
        } else {
            $formVal['password'] = bcrypt($formVal['password']);
        }

        $user = User::find(auth()->user()->id);
        $user->update($formVal);

        Session::flash('msg', 'Profile Updated');

        return redirect()->route('user.dashboard');
    }

     /*User Dashboard */
     public function dashboard()
     {
         return view('users.dashboard', [
             'heading' => 'Latest Tuition Listings',
             'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
         ]);
     }

      /* User Logout */
    public function logout(Request $req)
    {
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        Session::flash('msg', 'Logged Out Successfully');
        return redirect()->route('user.login');
    }
     
}
