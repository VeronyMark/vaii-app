<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function store(Post $post)
    {
        request()->validate([
            'body' => ['required', 'max:255']
        ], [
            'body.required' => 'Pre uverejnenie komentáru je povinné zadať text',
            'body.max' => 'Komentár je príliš dlhý',

        ]);

        $comment = $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        request()->session()->flash('statusKomentOk', 'Komentár bol úspešne pridaný!');
        return back();
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            return response()->json([
                'status' => 200,
                'message' => $comment,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'NOT FOUND',
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'body' => ['required', 'max:255']
            ], [
                'body.required' => 'Pre uverejnenie komentáru je povinné zadať text',
                'body.max' => 'Komentár je príliš dlhý',
            ]);

            $comment = Comment::find($id);
            $comment->update([
                'body' => $request->input('body'),
            ]);

            request()->session()->flash('statusKomentUpdate', 'Komentár bol úspešne aktualizovaný!');
            return response()->json(['message' => 'Comment updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating comment', 'message' => $e->getMessage()], 500);

        }
    }


    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found']);
        }

        $comment->delete();

        request()->session()->flash('statusKomentDelete', 'Komentár bol úspešne odstránený!');
        return response()->json([
            'status' => 200,
            'message' => 'Comment deleted successfully']);

    }
}
