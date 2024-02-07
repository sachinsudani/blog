<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        return new Response(Post::latest()->get(), Response::HTTP_OK);
    }

    public function show($id)
    {
        return new Response(Post::find($id), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return new Response($post, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request::all());
        return new Response($post, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return new Response(null, Response::HTTP_NO_CONTENT);
    }

}