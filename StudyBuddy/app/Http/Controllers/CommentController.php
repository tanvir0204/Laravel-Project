<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function storeComment(Request $req, $id)
    {
        $user = User::find(auth()->user()->id);
        $u_id = $user->id;
        $formVal = $req->validate(['text' => 'required|max:1000']);
        $formVal['listing_id'] = $id;
        $formVal['user_id'] = $u_id;
        $formVal['listing_id'] = $id;

        Comment::create($formVal);

        Session::flash('msg', 'Comment Posted');
        return redirect()->back();
    }
}
