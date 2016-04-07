<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class Post extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('post.index', array(
            'title' => 'Posts',
            'posts' => $posts
        ));
    }

    public function show($post_id)
    {
        $post = Post::find($post_id);

        return view('post.show', array(
            'title' => 'Post - View: ' . $post->id,
            'post'  => $post,
        ));
    }

    public function edit($post_id)
    {
        $post = Post::find($post_id);

        return view('blog.edit', array(
            'title' => 'Post - Edit: ' . $post->id,
            'post'  => $post,
        ));
    }

    public function update(Request $request, $post_id)
    {
        $this->validate($request, array(
            'blog_id'       => 'required',
            'user_id'       => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'content'       => 'required'
        ));

        $data = $request->all();

        $post = Post::find($post_id);

        $post->update($data);

        //\Flash::success('Post has been updated!');

        return redirect()->back();
    }

    public function create(Request $request)
    {
        $this->validate($request, array(
            'blog_id'       => 'required',
            'user_id'       => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'content'       => 'required'
        ));

        $data = $request->all();

        $post = Post::create($data);

        //\Flash::success('Post has been created!');

        return redirect()->back();
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        $post->delete();

        //\Flash::success('Post has been deleted!');

        return redirect()->back();
    }
}
