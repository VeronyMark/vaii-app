<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use App\Models\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Allow multiple images
            'category' => 'required'
        ]);

        $postData = [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => request()->user()->id,
            'category_id' => $request->input('category')
            // Add other fields as needed
        ];

        // Create the post
        $post = Post::create($postData);

        //Post::create($request->all());
        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('images'); // Customize the storage path as needed

                // Create the associated image record
                Image::create([
                    'post_id' => $post->id,
                    'filename' => $filename,
                    'original_name' => $image->getClientOriginalName(),
                    'file_path' => $filename, // Customize the storage path as needed
                ]);
            }
        }


        return redirect()->route('/')
            ->with('success', "Post bol úspešne zverejnený ");

    }







    // routes functions

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit', compact('post'));
    }

}





