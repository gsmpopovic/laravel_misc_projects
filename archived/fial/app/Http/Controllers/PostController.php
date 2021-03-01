<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Post; 
use App\Models\Tag; 
use App\Models\Category; 

class PostController extends Controller
{
    //

    // public function show($slug){

        public function __Invoke($slug){

        // Get general information about website.

        $website = General::query()->firstOrFail();

        // Get requested post, if it is published. 

        $post = Post::query()
        ->where('is_published', true)
        ->where('slug', $slug)
        ->firstOrFail();

        // Get all categories. 

        $categories = Category::all();

        // Get all tags. 

        $tags = Tag::all();

        // Get 5 most recent posts. 

        $recent_posts = Post::query()
        ->where('is_published', true)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        // Return appropriate view with data.

        return view('post', [
            'website'=>$website,
            'post'=>$post, 
            'categories'=>$categories, 
            'tags'=>$tags, 
            'recent_posts'=>$recent_posts
        ]);
    }
}
