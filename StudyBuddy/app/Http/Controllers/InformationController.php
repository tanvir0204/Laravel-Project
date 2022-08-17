<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformationController extends Controller
{
     /* Show Tutor Add InformationForm */
     public function create()
     {
         return view('tutors.information');
     }

    /* Store Tutor Information */
    public function store(Request $req)
    {
        $formVal = $req->validate([
            'g_name' => 'required|max:20|alpha',
            'g_phone' => 'required|digits:11|numeric',
            'phone' => 'required|digits:11|numeric',
            'location' => 'required',
            'gender' => 'required',
            's_institute' => 'required',
            's_group' => 'required',
            's_result' => 'required',
            's_year' => 'required|numeric',
            's_curriculum' => 'required',
            'h_institute' => 'required',
            'h_group' => 'required',
            'h_result' => 'required',
            'h_year' => 'required|numeric',
            'h_curriculum' => 'required',
            'u_institute' => 'required',
            'u_major' => 'required',
            'u_sem' => 'required|numeric',
            'u_result' => 'required',
            'u_year' => 'required|numeric',
            'u_type' => 'required'
        ],

        [
            "g_name.required" => "This field is required",
            "g_phone.required" => "This field is required",
            "s_institute.required" => "This field is required",
            "s_group.required" => "This field is required",

            "s_result.required" => "This field is required",
            "s_year.required" => "This field is required",
            "s_curriculum.required" => "This field is required",
            "h_institute.required" => "This field is required",

            "h_group.required" => "This field is required",
            "h_result.required" => "This field is required",
            "h_year.required" => "This field is required",
            "h_curriculum.required" => "This field is required",

            "u_institute.required" => "This field is required",
            "u_major.required" => "This field is required",
            "u_sem.required" => "This field is required",
            "u_result.required" => "This field is required",
            "u_year.required" => "This field is required",
            "u_type.required" => "This field is required",
        ]
    );
        
        $formVal['user_id'] = auth()->user()->id;
        Information::create($formVal);

        Session::flash('msg', 'Inforamtion Added Successfully');
        
        return redirect()->route('tutor.dashboard');
    }


    //Manage Information
    public function manage()
    {
        $user_id = auth()->user()->id;
        $information = Information::where('user_id', $user_id)->first();
        /* dd( $information); */
        return view('informations.edit', ['information' => $information]);
    }


    //Update Information
    public function update(Request $req)
    {
        /* $information = Information::find($id);
        if ($information->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action');
        } */

        $formVal = $req->validate([
            'g_name' => 'required',
            'g_phone' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'gender' => 'required',
            's_institute' => 'required',
            's_group' => 'required',
            's_result' => 'required',
            's_year' => 'required',
            's_curriculum' => 'required',
            'h_institute' => 'required',
            'h_group' => 'required',
            'h_result' => 'required',
            'h_year' => 'required',
            'h_curriculum' => 'required',
            'u_institute' => 'required',
            'u_major' => 'required',
            'h_institute' => 'required',
            'u_sem' => 'required',
            'u_result' => 'required',
            'u_year' => 'required',
            'u_type' => 'required'
        ]);

        /* dd($formVal); */

        $user_id = auth()->user()->id;
        $information = Information::where('user_id', $user_id)->first();
        $information->update($formVal);

        Session::flash('msg', 'Information Updated');
        return redirect()->route('tutor.dashboard');
    }
}
