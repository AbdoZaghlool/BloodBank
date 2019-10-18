<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Post;



class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(10);
        return responseJson(1, 'success', $posts);
    }

    public function show($id)
    {
        $posts = Post::find($id)->with('category')->paginate(1);
        return responseJson(1, 'success', $posts);
    }

    public function favouritePost(Request $request, Post $post)
    {
        $request->user()->posts()->attach($post->id);
        return responseJson(1, 'done');
    }
    public function unfavouritePost(Request $request, Post $post)
    {
        $request->user()->posts()->detach($post->id);
        return responseJson(1, 'done');
    }
    public function favourites(Request $request)
    {
        $var = $request->user()->posts;
        return responseJson(1, 'success', $var);
    }
}
