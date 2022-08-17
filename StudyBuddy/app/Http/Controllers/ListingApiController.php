<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListingApiController extends Controller
{
    //Create Listing
    public function create(Request $request)
    {
        try {
            //Validated
            $formVal = Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'location' => 'required',
                    'tags' => 'required',
                    'description' => 'required'
                ]
            );

            if ($formVal->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $formVal->errors()
                ], 401);
            }

            /* $user_id= auth()->user()->id; */

            $listing = Listing::create([
                'title' => $request->title,
                'location' => $request->location,
                'tags' => $request->tags,
                'description' => $request->description,
                'number' => $request->number,
                'user_id' => auth()->user()->id
            ]);


            return response()->json([
                    'listing' => $listing,
                    'message' => 'Listing Created Successfully'
            ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
    }

    //View Listing
    public function view()
    {
        $user_id = auth()->user()->id; 

        $listing = Listing::where('user_id', $user_id)->get();

        return response()->json($listing);
    }

    //Edit Listing
    public function edit($id)
    {
        $listing = Listing::whereId($id)->first();
        return response()->json($listing);
    }

    //Update Listing
    public function update(Request $request, $id)
    {
        $listing = Listing::whereId($id) -> first();

        $listing -> update([
            'title' => $request->title,
            'location' => $request->location,
            'tags' => $request->tags,
            'description' => $request->description,
            'number' => $request->number
        ]);

        return response()->json('Success');
    }

    //Delete Listing
    public function destroy($id)
    {
        Listing::whereId($id) -> first()->delete();
        return response()->json('Deleted');
    }

    //View Listing Guest
    public function viewListing()
    {
        $listing = Listing::latest()->get();
    
        return response()->json($listing);
    }
}
