<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index () {
        return Post::all();
    }
    public function PostUser($id) {
        return Post::find(1)->comments;
    }
    public function store (Request $request) {
        return Post::create($request->all());
    }
}
