<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    //STORE UKLADA DO DATABAZY
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
         //   'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Allow multiple images
            'category_id' => 'required', // Assuming you have a 'categories' table
            'excerpt' => 'required|max:500',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg', // Validate the single image|max:2048

        ]);


// Automatically generate a unique ID for filename...
        //$path = Storage::putFile('images', new File($request->file('image')));
        //$path = Storage::putFile('images', new File($request->file('image')));


        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        /*if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
*/

            // Create a new post in the database
        Post::create([
            'user_id' => $request->user()->id, // Assuming you have user authentication
            'category_id' =>  $request->input('category_id'),
            'slug' => Str::slug($request->input('title')),
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'published_at' => Carbon::now(),
          //  'image_path' => $path// $imagePath,
            'image_path' => $imagePath,

        ]);

        return redirect()->route('welcome')->with('success','uspech');



    }





        //Post::create($request->all());
        //Post::create($request->all());
        /* Handle image uploads
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
        }*/

       // return back();




    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit', compact('post'));
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('welcome');

    }



}





