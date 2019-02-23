<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\File;


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
        $categories = Category::all();
        return view('post.index')->withPosts($posts)->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'body' => 'required|max:2000'
        ]);

        $post = new Post();

        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;


        $post->save();

        \Session::flash('success', 'Post created Successfully');
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (Auth::user()->id != $post->user_id) {
            abort(404);
        }

        if ($post == null) {
            abort(404);
        }

        $categories = Category::all();

        return view('post.edit')->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|max:2000'
        ]);

        $post = Post::find($id);
        if (Auth::user()->id != $post->user_id) {
            abort(404);
        }

        if ($post == null) {
            abort(404);
        }

        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;


        $post->save();

        \Session::flash('success', 'Post Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (Auth::user()->id != $post->user_id) {
            abort(404);
        }

        if ($post == null) {
            abort(404);
        }
        $post->delete();

        return redirect()->back();
    }
}
