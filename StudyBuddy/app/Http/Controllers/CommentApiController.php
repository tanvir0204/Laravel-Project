<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentApiController extends Controller
{
    //Edit Comment
    public function fetch($id)
    {
        $comment = Comment::where("listing_id", $id)->with('user')->get();
        return response()->json($comment);
    }

    //Create Comment
    public function addComment(Request $request)
    {
        try {
            //Validated
            $formVal = Validator::make(
                $request->all(),
                [
                    'text' => 'required'
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

            $comment = Comment::create([
                'text' => $request->text,
                'listing_id' => $request->listing_id,
                'user_id' => auth()->user()->id
            ]);


            return response()->json([
                    'comment' => $comment,
                    'message' => 'Comment Created Successfully'
            ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
    }
}
