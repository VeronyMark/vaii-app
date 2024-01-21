<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;



class CommentController extends Controller
{

    public function store(Post $post)
    {
        request()->validate([
            'body' => ['required','max:255']
        ], [
            'body.required' => 'Pre uverejnenie komentáru je povinné zadať text',
             'body.max' => 'Komentár je príliš dlhý',

        ]);

        $comment = $post->comments()->create([
            'user_id' =>  request()->user()->id,
            'body' => request('body')
        ]);

        request()->session()->flash('statusKomentOk', 'Komentár bol úspešne pridaný!');

        return back();
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        if($comment) {
            return response()->json([
                'status'=>200,
                'message'=>$comment,
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>'NOT FOUND',
            ]);
        }
    }


    public function update(Request $request, $id)
    {
         $request->validate([
            'body' => 'required'
        ]);

        $comment = Comment::find($id);

        $comment->update([
            'body' => $request->input('body'),
        ]);
//TOFO KONTROLA

        request()->session()->flash('statusKomentUpdate', 'Komentár bol úspešne aktualizovaný!');
        return response()->json(['message' => 'Post updated successfully']);

    }


    //TODO KONTROLA ID
    public function destroy( $comment_id)
    {
        $comment =  Comment::find($comment_id);

        if (!$comment) {
            return response()->json([ 'message' => 'Comment not found']);
        }

        $comment->delete();

        request()->session()->flash('statusKomentDelete', 'Komentár bol úspešne odstránený!');
       return response()->json([
           'status'=>200,
           'message' => 'Comment deleted successfully']);

    }
}
