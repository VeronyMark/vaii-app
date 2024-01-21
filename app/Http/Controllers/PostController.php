<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{


    //ZOBRAZENIE VSETKYCH POSTOV NA BLOGPAGE
    public function index()
    {

        return view('blogPage', [
            'posts' => (Post::latest()->with('category', 'author'))->paginate(8),
            'categories' => Category::all(),

        ]);
    }


    //KONKRETNY POST ZOBRAZENIE
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post

        ]);
    }


    public function store(Request $request): JsonResponse
    {

        try {

            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
            }


            $request->validate([
                'title' => ['required', 'max:70', 'string'],
                'category_id' => ['required'],
                'excerpt' => ['required', 'max:150'],
                'body' => ['required', 'max:1000', 'string'],


            ], [
                'title.required' => 'Chýbajúci nádpis',
                'title.max' => 'Nádpis je príliš dlhý',
                'body.required' => 'Chýbajúci článok',
                'body.max' => 'Článok je príliš dlhý',
                'category_id.required' => 'Chýbajúca kategória',
                'excerpt.required' => 'Chýbajúca ukážka článku',
                'excerpt.max' => 'Ukážka je príliš dlhá',

            ]);

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
            $postHtml = view('post', ['post' => $createdPost])->render();

            return response()->json(['message' => 'Post created successfully', 'post' => $postHtml], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating post', 'message' => $e->getMessage()], 500);
        }

    }


    public function getPostDetails(Post $post)
    {
        return response()->json([
            'id' => $post->id,
            'slug' => $post->slug,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
        $request->validate([
            'title' => ['required', 'max:70', 'string'],
            'excerpt' => ['required', 'max:150'],
            'body' => ['required', 'max:1000', 'string'],
        ], [
            'title.required' => 'Chýbajúci nádpis',
            'title.max' => 'Nádpis je príliš dlhý',
            'body.required' => 'Chýbajúci článok',
            'body.max' => 'Článok je príliš dlhý',
            'excerpt.required' => 'Chýbajúca ukážka článku',
            'excerpt.max' => 'Ukážka je príliš dlhá',

        ]);

        $post = Post::find($id);

        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'excerpt' => $request->input('excerpt'),
        ]);

        $request->session()->flash('statusPostUpdateOk', 'Príspevok bol úspešne aktualizovaný!');

        return response()->json(['message' => 'Post updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating post', 'message' => $e->getMessage()], 500);

        }


    }


    public function create(Request $request)
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
    }



    public function editPost(Post $post)
    {
        // You might perform additional logic here if needed

        return response()->json(['post' => $post]);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        request()->session()->flash('statusDeleteOk', 'Príspevok bol úspešne odstránený!');
        return redirect()->route('welcome');
    }

}





