<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

//kontroly

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //ZOBRAZENIE VSETKYCH POSTOV NA BLOGPAGE
    public function index() {

        return view('blogPage', [
            'posts' => (Post::latest()->with('category', 'author'))->paginate(8),
            'categories' => Category::all(),

        ]);
    }


    //KONKRETNY POST ZOBRAZENIE
    public function show(Post $post) {
        return view('post', [
            'post' => $post

        ]);
    }



/**
 * Store a newly created resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */



    public function store(Request $request):JsonResponse {

        try {
            //$validatedData = $request->validated();


            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
            }

            // TODO OVERENIE SQL INJECTION -> KONTROLA SPECIAL ZNAKOV


            $post = Post::create([
                'user_id' => $request->user()->id,
                'category_id' => $request->input('category_id'),
                'slug' => Str::slug($request->input('title')),
                'title' => $request->input('title'),
                'excerpt' => $request->input('excerpt'),
                'body' => $request->input('body'),
                'created_at' => now(),
                'updated_at' => now(),
                'published_at' => now(),
                'image' => $imageName,
            ]);


            $createdPost = Post::with(['author', 'category'])->find($post->id);

            // Return the post content as HTML
            $postHtml = view('post', ['post' => $createdPost])->render();

            return response()->json(['message' => 'Post created successfully', 'post' => $postHtml], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating post', 'message' => $e->getMessage()], 500);
        }

    }











//STORE UKLADA DO DATABAZY
public function storeOLD(PostRequest $request) {

    $validatedData = $request->validated();
    /*
     $request->validate([
        'title' => 'required|max:255|string',
        'body' => 'required',
        //   'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Allow multiple images
        'category_id' => 'required', // Assuming you have a 'categories' table
        'excerpt' => 'required|max:500',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg', // Validate the single image|max:2048

    ], [
         'title.required' => 'A title is required',
         'body.required' => 'A message is required',
         'category_id.required' => 'A category is required',
         'excerpt.required' => 'An excerpt is required',
         'image.image' => 'The file must be an image',
         'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg',
         'image.max' => 'The image must be less than 2048 kilobytes',
     ]);
*/

// Automatically generate a unique ID for filename...
    //$path = Storage::putFile('images', new File($request->file('image')));
    //$path = Storage::putFile('images', new File($request->file('image')));

    // $imagePath = $request->file('image')->store('images'); // 'images' is a storage disk, adjust as needed

    // $imagePath = null;

    //    if ($request->hasFile('image')) {
    //      $imagePath = $request->file('image')->store('images', 'public');
    // }

    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

    }
    //  $imagePath = $request->file('image')->store('post'); // 'images' is a storage disk, adjust as needed
    // $validated['image'] = $imagePath;

    //  Storage::disk('public')->delete($post->image); AK BY SME CHCELI EDIT


    // TODO OVERENIE SQL INJECTION -> KONTROLA SPECIAL ZNAKOV
    Post::create([
        'user_id' => $request->user()->id, // Assuming you have user authentication
        'category_id' => $request->input('category_id'),
        'slug' => Str::slug($request->input('title')),
        'title' => $request->input('title'),
        'excerpt' => $request->input('excerpt'),
        'body' => $request->input('body'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'published_at' => Carbon::now(),
        //  'image_path' => $path// $imagePath,
        'image' => $imageName,

    ]);
    $request->session()->flash('statusPostOk', 'Príspevok bol úspešne pridaný!');

    return redirect()->route('welcome');


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
    public function getPostDetails(Post $post)
    {
        // You can customize the data you want to return for post details
        return response()->json([
            'id' => $post->id,
            'slug' => $post->slug,
            // Add other relevant details you might need
        ]);
    }

public
function update(Request $request, $id)
{

    $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'excerpt' => 'required|max:500',
        // Add other validation rules as needed
    ]);

    // Update the post attributes
    $post = Post::find($id);
    /* $post->title = $request->input('title');
      $post->body = $request->input('body');
     $post-> excerpt = $request->input('excerpt');
     */
    $post->update([
        'title' => $request->input('title'),
        'body' => $request->input('body'),
        'excerpt' => $request->input('excerpt'),
        // Update other attributes as needed
    ]);

    $request->session()->flash('statusPostUpdateOk', 'Príspevok bol úspešne aktualizovaný!');

    return response()->json(['message' => 'Post updated successfully']);

}


/**
 * Show the form for creating a new post.
 *
 * @return \Illuminate\Http\Response
 */
public
function create(Request $request)
{
    $categories = Category::all();
    return view('create', compact('categories'));
}

public
function edit($id)
{
    $post = Post::find($id);
    if ($post) {
        return response()->json([
            'status' => 200,
            'message' => $post,
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'NOT FOUND',
        ]);
    }

    // return view('edit', compact('post'));
}

    public function updatePost(Request $request, Post $post)
    {
        // Validate the request data if necessary

        $post->update($request->all());

        return response()->json(['message' => 'Post updated successfully']);
    }

    public function editPost(Post $post)
    {
        // You might perform additional logic here if needed

        return response()->json(['post' => $post]);
    }


public
function destroy(Post $post)
{

    $post->delete();
    request()->session()->flash('statusDeleteOk', 'Príspevok bol úspešne odstránený!');
    return redirect()->route('welcome');
}

}





