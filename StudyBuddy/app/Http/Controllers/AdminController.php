<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminDashboard() { 
      return view('adminOperations.adminDashboard',[
     'listings'=> Listing::latest()->filter(request(['tag', 'search']))->simplepaginate(4)
 ]); 
      }

      public function users()
    {

        $user = User::where("type", "user")->get();

        return view("adminOperations.user", ['users' => $user]);
    }
    public function edituser($id)
    {

      $user = User::find($id);
      return view('users.edit', ['users' => $user]);
    }

    public function tutors()
    {

        $user = User::where("type", "tutor")->get();

        return view("adminOperations.tutor", ['users' => $user]);
        // return view('adminOperations.tutor');
    }


    
    public function deleteUser($id)
    {

        $user = User::find($id);
        $user->delete();
        Session::flash('msg', 'User Deleted');


        return redirect('/adminOperations/user');
    }

    public function manageListing()
    {
      // return view('adminOperations.manageListing',['listings'=>auth()->user()->listings()->get()]);
      $listing = Listing::all();
        return view('adminOperations.managelisting', ['listings' => $listing]);

 
    }

    public function deleteList($id)
    {

        $listing = Listing::find($id);
        $listing->delete();
        Session::flash('msg', 'Listing Deleted Sucessfully');


        return redirect('/adminOperations/manageListing');
    }

    // log out
    public function logout(Request $request) {
      auth()->logout();

      $request->session()->invalidate();
       $request->session()->regenerateToken();
      return redirect('/')->with('message','You have been logged out!');

  }

    
}
