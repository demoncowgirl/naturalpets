<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function getSingle($slug){
    // fetch from database based on $slug
    $post = Post::where('slug', $slug)->first();
    // return the view and pass in the post object
    return view('pages.single')->with('post', $post);
  }
}
