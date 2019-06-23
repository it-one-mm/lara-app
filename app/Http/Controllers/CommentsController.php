<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function newComment(Request $request) {
        $comment = $request->all();
        Comment::create($comment);
        return redirect()->back()->with('status', 'Your comment has been created!');
    }
}
