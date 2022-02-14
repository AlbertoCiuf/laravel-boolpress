<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
      $posts = Post::all();
      $tags = Tag::all();
      $categories = Category::all();
      return response()->json(compact('posts', 'tags', 'categories'));
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

    public function getPostsByCategory($categorySlug) {
      $category = Category::where('slug', $categorySlug)->with('posts.tags')->first();
      
      $success = true;
      $error = '';

      if (!$category) {
        $success = false;
        $error = 'La categoria non esiste.';
      }elseif ($category && count($category['posts']) === 0) {
        $success = false;
        $error = 'Non ci sono post per la categoria selezionata';
      }

      return response()->json(compact('success', 'category', 'error'));

    }


    public function getPostsByTag($tagSlug) {
      $tag = Tag::where('slug', $tagSlug)->with('posts.category')->first();
      
      $success = true;
      $error = '';

      if(!$tag) {
        $success = false;
        $error = 'Il Tag non esiste';
      }elseif($tag && count($tag['posts']) === 0) {
        $success = false;
        $error = 'Non ci sono post per il tag selezionato';
      }

      return response()->json(compact('success','tag','error'));
    }
}
