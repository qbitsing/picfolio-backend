<?php

namespace App\Http\Controllers;
use App\Http\Resources\Posts;
use App\Http\Resources\UserPosts;
use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostController extends Controller
{
    public function index () {
        return Posts::collection(Post::all());
    }
    public function UserPosts($id) {
        $user = User::findOrFail($id);
        return new UserPosts($user);
    }
    public function store (Request $request) {
        return Post::create($request->all());
    }
}
