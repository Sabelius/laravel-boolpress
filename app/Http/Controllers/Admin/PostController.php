<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.posts.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'published_at' =>'required|date|',
            'post_name' => 'required|string|unique:posts|max:100',
            'post_description' => 'required|string|unique:posts|max:255',
            'content' => 'required|string|min:200',
            'category_id' => "nullable"
        ],
        [
            "required" => 'Devi compilare correttamente :attribute',
            "published_at.required" => 'Inserisci data',
            "post_name.required" => 'Inserisci titolo',
            "post_name.max" => 'Il titolo deve essere lungo massimo 100 caratteri',
            "post_description.required" => 'Inserisci descrizione',
            "post_description.max" => 'La descrizione deve essere lunga massimo 255 caratteri',
            "content.required"=> "Inserisci corpo post",
            'content.min' => 'Il post deve essere lungo almeno 200 caratteri',
        ]);


        $data = $request->all();
        $data["user_id"] = Auth::user()->id;
        $category = Category::find($data["category_id"]);
        $newPost = Post::create($data);
        // $category->posts()->save($newPost);
        if($category!== null){
            $category->posts()->save($newPost);
            $newPost->refresh();
        } else {
            $newPost->save();
        }

        if(array_key_exists("tags", $data)) $newPost->tags()->attach($data["tags"]);
        // $newPost->save();
        return redirect()->route('admin.posts.show', $newPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view("admin.posts.edit", compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data["user_id"] = Auth::user()->id;
        $category = Category::find($data["category_id"]);
        $post->update($data);
        if($category!== null){
            $category->posts()->save($post);
        } else {
            $post->category()->dissociate();
            $post->save();
        }
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
