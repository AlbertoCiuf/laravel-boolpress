<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
      $posts = Post::all();
      return response()->json($posts);
    }

    public function show($slug) {
      $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

      if(!$post) {
        $post = [
          "title" => "Post non trovato",
          "content" => ""
        ];
      }

      return response()->json($post);
    }
}
