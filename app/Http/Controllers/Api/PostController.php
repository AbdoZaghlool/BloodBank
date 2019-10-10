<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $posts = Post::find($id)->with('category')->paginate(10);
        return responseJson(1, 'success', $posts);
    }
}
