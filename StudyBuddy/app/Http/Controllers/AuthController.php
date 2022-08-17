<?php

namespace App\Http\Controllers;

use App\Mail\LogInMail;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /* Create User */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => "user"
            ]);

            /* $u_name = $request->name; */

            Mail::to($request->email)->send(new LogInMail());
        
            return response()->json([
                    'user' => $user,
                    'message' => 'User Created Successfully'
            ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
            
    }

    /* Create Tutor */
    public function createTutor(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => "tutor"
            ]);


            return response()->json([
                    'user' => $user,
                    'message' => 'Tutor Created Successfully'
            ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
    }

    /* Login All Users */ 
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('myapptoken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'message' => 'Logged In Successfully',
                'token' => $token
                 ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                'status' => false,
                'message' => $th->getMessage()
                ], 500);
            }
    }

    /* View Profile */
    public function manageProfile()
    {
        return response()->json(auth()->user());
    }

    public function updateProfile(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::whereId($request->id)->first();

            $user -> update ([
                'name' => $request->name,
                'email' => $request->email
            ]);


            return response()->json([
                    'message' => 'Updated Successfully'
            ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
    }

    /* Logout All Users */
    /* public function logout(Request $request)
    {
       auth()->user()->tokens()->delete();
       
       return[
        'message' => 'Logged Out Successfully'
       ];
    } */

    /* Add User */
    public function addUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => "user"
            ]);

        

            return response()->json([
                    'user' => $user,
                    'message' => 'User Created Successfully'
            ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
    }

    //View Users
    public function viewUser()
    {
        $user = User::where("type", "user")->get();

        return response()->json($user);
    }

    //Edit User
    public function editUser($id)
    {
        return response() -> json(User::whereId($id)->first());
    }

    //Update User
    public function updateUser(Request $request, $id)
    {
        $user = User::whereId($id) -> first();

        $user -> update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json('Success');
    }

    //Delete Users
    public function destroyUser($id)
    {
        User::whereId($id) -> first()->delete();
        return response()->json('Deleted');
    }

    /* Add Tutor */
    public function addTutor(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => "tutor"
            ]);

        

            return response()->json([
                    'user' => $user,
                    'message' => 'User Created Successfully'
            ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
    }

    //View Tutors
    public function viewTutor()
    {
        $user = User::where("type", "tutor")->get();

        return response()->json($user);
    }


    //View Al  Users
    public function viewAllUser()
    {
        $user = User::all();

        return response()->json($user);
    }




    //View Listing
    public function viewListing()
    {
        $listing = Listing::latest()->get();

        return response()->json($listing);
    }


    
}
