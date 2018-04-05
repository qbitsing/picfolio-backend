<?php

namespace App\Http\Controllers;
use App\Http\Resources\Posts;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index () {
        return Posts::collection(Post::all());
    }
    public function PostUser($id) {
        return Post::find($id)->comments;
    }
    public function store (Request $request) {
        return Post::create($request->all());
    }
}
