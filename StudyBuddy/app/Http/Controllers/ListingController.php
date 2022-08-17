<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    /* Show all Listing */
    public function home()
    {
        return view('components.home');
    }
    public function index()
    {
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    /* Create Listings */
    public function create()
    {
        
        return view('listings.create');
    }

     /* Store all Listings */
    public function store(Request $req)
    {
        $formVal = $req->validate([
            'title' => 'required|max:100',
            'location' => 'required',
            'tags' => 'required',
            'number' => 'required|digits:11|numeric',
            'description' => 'required|max:500'
        ],

        [
            [
                "title.required" => "This field is required",
                "location.required" => "This field is required",
                "tags.required" => "This field is required",
                "number.required" => "This field is required",
                "number.digits" => "The number must be 11 digits",
                "title.max" => "Title should not exceed 100 characters",
                "description.max" => "Description should not exceed 500 characters"
            ]
        ]
    );

        $formVal['user_id'] = auth()->user()->id;

        Listing::create($formVal);

        Session::flash('msg', 'Tution Listing Created');

        return redirect()->route('all.listing');
    }


    //Show Edit Form
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('listings.edit', ['listing' => $listing]);
    }


    //Show Update Form
    public function update($id, Request $req)
    {
        $listing = Listing::find($id);
        if ($listing->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action');
        }

        $formVal = $req->validate([
            'title' => 'required|max:100',
            'location' => 'required',
            'tags' => 'required',
            'number' => 'required|digits:11|numeric',
            'description' => 'required|max:500'
        ],

        [
            [
                "title.required" => "This field is required",
                "location.required" => "This field is required",
                "tags.required" => "This field is required",
                "number.required" => "This field is required",
                "number.digits" => "The number must be 11 digits",
                "title.max" => "Title should not exceed 100 characters",
                "description.max" => "Description should not exceed 500 characters"
            ]
        ]
    );
        
        
        $listing->update($formVal);

        Session::flash('msg', 'Tuition Listing Updated');


        return redirect()->route('all.listing'); 
    }

    //Show Delete Form
    public function delete($id)
    {

        $listing = Listing::find($id);
        $listing->delete();
        Session::flash('msg', 'Tuition Listing Deleted');

        return redirect()->route('all.listing');
    }

    //Singlisg Listing Show
    public function show($id)
    {
        $listing = Listing::find($id);
        $comment = Comment::where("listing_id", $id)->get();
        if ($listing) {
            return view(
                'listings.show',
                [
                    'listing' => $listing,
                    'comments' => $comment
                ]
            );
        } else {
            abort('404');
        }
    }

    //Manage Listing
    public function manage()
    {
        $user_id = auth()->user()->id;
        $listing = Listing::where('user_id', $user_id)->get();
        return view('listings.manage', ['listings' => $listing]);
    }
}
